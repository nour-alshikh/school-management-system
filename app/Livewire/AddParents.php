<?php

namespace App\Livewire;

use App\Models\BloodType;
use App\Models\Guardian;
use App\Models\GuardianAttachment;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParents extends Component
{

    use WithFileUploads;

    #[Validate]

    public $current_step = 1,
        $success_message = "",
        $catch_error = "",
        $update_mode = false,
        $show_table = true,


        $email, $password, $photos, $guardian_id,

        //  Father
        $f_name, $f_name_en, $f_national_id, $f_passport_id, $f_phone, $f_job, $f_job_en, $f_nationality, $f_blood_type, $f_address, $f_religion,

        //  Mother
        $m_name, $m_name_en, $m_national_id, $m_passport_id, $m_phone, $m_job, $m_job_en, $m_nationality, $m_blood_type, $m_address, $m_religion;


    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:5',
            'f_national_id' => 'required|min:10|max:10',
            'f_passport_id' => 'required|min:10|max:10',
            'f_phone' => 'required|min:10|max:10',
            'm_national_id' => 'required|min:10|max:10',
            'm_passport_id' => 'required|min:10|max:10',
            'm_phone' => 'required|min:10|max:10',
        ];
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function render()
    {
        return view('livewire.add-parents', [
            'nationalities' => Nationality::all(),
            'religions' => Religion::all(),
            'blood_types' => BloodType::all(),
            'guardians' => Guardian::all(),
        ])->layout('components.layouts.app');
    }

    public function showForm()
    {
        $this->show_table = false;
    }
    public function showTable()
    {
        $this->show_table = true;
    }

    public function submitFirstStep()
    {

        $validated_data = $this->validate([
            'email' => 'required|email|unique:guardians,email',
            'password' => 'required|string',
            'f_name' => 'required',
            'f_name_en' => 'required',
            'f_job' => 'required',
            'f_job_en' => 'required',
            'f_national_id' => 'required|min:10|max:10',
            'f_passport_id' => 'required|min:10|max:10|unique:guardians,father_passport_id',
            'f_phone' => 'required|min:10|max:10|unique:guardians,father_phone',
            'f_nationality' => 'required',
            'f_blood_type' => 'required',
            'f_address' => 'required',
            'f_religion' => 'required',
        ]);

        $this->current_step = 2;
    }
    public function submitSecondStep()
    {

        $validated_data = $this->validate([
            'm_name' => 'required',
            'm_name_en' => 'required',
            'm_job' => 'required',
            'm_job_en' => 'required',
            'm_national_id' => 'required|min:10|max:10|unique:guardians,mother_passport_id',
            'm_passport_id' => 'required|min:10|max:10|unique:guardians,mother_phone',
            'm_phone' => 'required|min:10|max:10',
            'm_nationality' => 'required',
            'm_blood_type' => 'required',
            'm_address' => 'required',
            'm_religion' => 'required',
        ]);

        $this->current_step = 3;
    }

    public function back($step)
    {
        $this->current_step = $step;
    }

    public function submitForm()
    {
        try {
            // save data to database
            $guardian = new Guardian();
            $guardian->email = $this->email;
            $guardian->password = Hash::make($this->password);

            $guardian->father_name = ['ar' => $this->f_name, 'en' => $this->f_name_en];
            $guardian->father_national_id = $this->f_national_id;
            $guardian->father_passport_id = $this->f_passport_id;
            $guardian->father_phone = $this->f_phone;
            $guardian->father_job = ['ar' => $this->f_job, 'en' => $this->f_job_en];
            $guardian->father_nationality_id = $this->f_nationality;
            $guardian->father_blood_type_id = $this->f_blood_type;
            $guardian->father_religion_id = $this->f_religion;
            $guardian->father_address = $this->f_address;

            $guardian->mother_name = ['ar' => $this->m_name, 'en' => $this->m_name_en];
            $guardian->mother_national_id = $this->m_national_id;
            $guardian->mother_passport_id = $this->m_passport_id;
            $guardian->mother_phone = $this->m_phone;
            $guardian->mother_job = ['ar' => $this->m_job, 'en' => $this->m_job_en];
            $guardian->mother_nationality_id = $this->m_nationality;
            $guardian->mother_blood_type_id = $this->m_blood_type;
            $guardian->mother_religion_id = $this->m_religion;
            $guardian->mother_address = $this->m_address;

            $guardian->save();

            // checking if there is photos and add them if there is

            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->f_national_id, $photo->getClientOriginalName(), $disk = "parents_attachments");

                    GuardianAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'guardian_id' => Guardian::latest()->first()->id
                    ]);
                }
            }

            $this->success_message = trans('messages.added_message');
            $this->current_step = 1;
            $this->show_table = true;
            $this->clearForm();
        } catch (\Exception $e) {
            $this->catch_error = $e->getMessage();
        }
    }


    public function edit($id)
    {
        $this->show_table = false;
        $this->update_mode = true;
        $data = Guardian::findOrFail($id);
        $this->guardian_id = $id;
        $this->email = $data->email;
        $this->f_name = $data->getTranslation('father_name', 'ar');
        $this->f_name_en = $data->getTranslation('father_name', 'en');
        $this->f_national_id = $data->father_national_id;
        $this->f_passport_id = $data->father_passport_id;
        $this->f_phone = $data->father_phone;
        $this->f_job = $data->getTranslation('father_job', 'ar');
        $this->f_job_en = $data->getTranslation('father_job', 'en');
        $this->f_nationality = $data->father_nationality_id;
        $this->f_blood_type = $data->father_blood_type_id;
        $this->f_religion = $data->father_religion_id;
        $this->f_address = $data->father_address;

        $this->m_name = $data->getTranslation('mother_name', 'ar');
        $this->m_name_en = $data->getTranslation('mother_name', 'en');
        $this->m_national_id = $data->mother_national_id;
        $this->m_passport_id = $data->mother_passport_id;
        $this->m_phone = $data->mother_phone;
        $this->m_job = $data->getTranslation('mother_job', 'ar');
        $this->m_job_en = $data->getTranslation('mother_job', 'en');
        $this->m_nationality = $data->mother_nationality_id;
        $this->m_blood_type = $data->mother_blood_type_id;
        $this->m_religion = $data->mother_religion_id;
        $this->m_address = $data->mother_address;
    }

    public function submitEditFirstStep()
    {
        $validated_data = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'f_name' => 'required',
            'f_name_en' => 'required',
            'f_job' => 'required',
            'f_job_en' => 'required',
            'f_national_id' => 'required|min:10|max:10',
            'f_passport_id' => 'required|min:10|max:10',
            'f_phone' => 'required|min:10|max:10',
            'f_nationality' => 'required',
            'f_blood_type' => 'required',
            'f_address' => 'required',
            'f_religion' => 'required',
        ]);

        $this->update_mode = true;
        $this->current_step = 2;
    }
    public function submitEditSecondStep()
    {
        $validated_data = $this->validate([
            'm_name' => 'required',
            'm_name_en' => 'required',
            'm_job' => 'required',
            'm_job_en' => 'required',
            'm_national_id' => 'required|min:10|max:10',
            'm_passport_id' => 'required|min:10|max:10',
            'm_phone' => 'required|min:10|max:10',
            'm_nationality' => 'required',
            'm_blood_type' => 'required',
            'm_address' => 'required',
            'm_religion' => 'required',
        ]);

        $this->update_mode = true;
        $this->current_step = 3;
    }
    public function editBack($step)
    {
        $this->update_mode = true;
        $this->current_step = $step;
    }

    public function submitUpdateForm()
    {
        try {
            $guardian = Guardian::findOrFail($this->guardian_id);
            $guardian->email = $this->email;
            $guardian->password = Hash::make($this->password);

            $guardian->father_name = ['ar' => $this->f_name, 'en' => $this->f_name_en];
            $guardian->father_national_id = $this->f_national_id;
            $guardian->father_passport_id = $this->f_passport_id;
            $guardian->father_phone = $this->f_phone;
            $guardian->father_job = ['ar' => $this->f_job, 'en' => $this->f_job_en];
            $guardian->father_nationality_id = $this->f_nationality;
            $guardian->father_blood_type_id = $this->f_blood_type;
            $guardian->father_religion_id = $this->f_religion;
            $guardian->father_address = $this->f_address;

            $guardian->mother_name = ['ar' => $this->m_name, 'en' => $this->m_name_en];
            $guardian->mother_national_id = $this->m_national_id;
            $guardian->mother_passport_id = $this->m_passport_id;
            $guardian->mother_phone = $this->m_phone;
            $guardian->mother_job = ['ar' => $this->m_job, 'en' => $this->m_job_en];
            $guardian->mother_nationality_id = $this->m_nationality;
            $guardian->mother_blood_type_id = $this->m_blood_type;
            $guardian->mother_religion_id = $this->m_religion;
            $guardian->mother_address = $this->m_address;

            $guardian->save();

            // checking if there is photos and add them if there is

            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->f_national_id, $photo->getClientOriginalName(), $disk = "parents_attachments");

                    GuardianAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'guardian_id' => Guardian::latest()->first()->id
                    ]);
                }
            }

            $this->success_message = trans('messages.edited_message');
            $this->current_step = 1;
            $this->show_table = true;
            $this->clearForm();
        } catch (\Exception $e) {
            $this->catch_error = $e->getMessage();
        }
    }

    public function delete($id)
    {
        // return "erferf";
        Guardian::findOrFail($id)->delete();
        $this->success_message = trans('messages.deleted_message');
    }

    public function clearForm()
    {
        $this->email = "";
        $this->password = "";
        $this->f_name = "";
        $this->f_name_en = "";
        $this->f_national_id = "";
        $this->f_passport_id = "";
        $this->f_phone = "";
        $this->f_job = "";
        $this->f_job_en = "";
        $this->f_nationality = "";
        $this->f_blood_type = "";
        $this->f_address = "";
        $this->f_religion = "";

        //  Mother
        $this->m_name = "";
        $this->m_name_en = "";
        $this->m_national_id = "";
        $this->m_passport_id = "";
        $this->m_phone = "";
        $this->m_job = "";
        $this->m_job_en = "";
        $this->m_nationality = "";
        $this->m_blood_type = "";
        $this->m_address = "";
        $this->m_religion = "";
    }
}
