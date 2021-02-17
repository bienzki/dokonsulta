<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PatientModel;
use App\Models\AppointmentModel;
use App\Models\FavoriteModel;

class Patients extends BaseController
{
    public function appointments() {
        $appointmentModel = new AppointmentModel();
        $today = $appointmentModel->select('appointment.status, appointment.type, users.firstName, users.lastName, appointment.clinicId, appointment.created')
                                  ->like('date', date('Y-m-d'))->where('patientId', session()->get('id'))->where('appointment.status', 'approved')
                                  ->join('users', 'users.id = appointment.doctorId')->findAll();
        $next = $appointmentModel->select('appointment.status, appointment.type, users.firstName, users.lastName, appointment.clinicId, appointment.created, appointment.date')
                                  ->where('date >', date('Y-m-d H:i'))->where('patientId', session()->get('id'))->join('users', 'users.id = appointment.doctorId')
                                  ->orderBy('appointment.status ASC, appointment.date DESC')->findAll();
        $history = $appointmentModel->select('appointment.status, appointment.type, users.firstName, users.lastName, appointment.clinicId, appointment.created, appointment.date')
                                  ->where('date <', date('Y-m-d'))->where('patientId', session()->get('id'))->where('appointment.status', 'approved')
                                  ->join('users', 'users.id = appointment.doctorId')->orderBy('date', 'desc')->findAll();
        $data = [
			'metaTitle' => 'Appointments - DoKonsulta',
            'today' => $today,
            'next' => $next,
            'history' => $history
        ];
        
        echo view('/patients/templates/header', $data);
        echo view('/patients/appointments');
        echo view('/patients/templates/footer');
    }

    public function doctors() {
        $userModel = new UserModel();

        $doctors = $userModel->where('type', 'doctor')->where('status', 'verified')->join('doctor', 'users.id = doctor.doctorId')->findAll();

        $cities = $userModel->where('type', 'doctor')->where('status', 'verified')->groupBy('city')->findAll();
        
        $data = [
            'metaTitle' => 'Doctors - DoKonsulta',
            'doctors' => $doctors,
            'cities' => $cities
        ];
        $data['specialties'] = [
			'Adolescent Medicine', 'Adult Rheumatology', 'Allergy and Immunology', 'Anaesthesiology', 'Anesthesia', 'Body Interventional Radiology', 'Cardiology', 
            'Cardiothoracic Surgery', 'Child and Adolescent Psychiatry and Psychotherapy', 'Clinical Neurophysiology', 'Counseling Psychology', 
            'Counseling Psychology and Psychotherapy', 'Degenerative and Oncologic Spine Surgery', 'Dentistry', 'Dermato-Venereology', 'Dermatology', 
            'Emergency Medicine', 'Endocrinology', 'Family and Community Medicine Specialist', 'Family Medicine', 'Gastroenterology', 'General Orthopaedics', 
            'General Paediatrics', 'General Practice', 'General Surgery', 'Geriatrics', 'Gynecologic Oncology', 'Hand', 'Shoulder', 'and Upper Extremities Specialist', 
            'Health Informatics', 'Hospice and Palliative Medicine', 'Infectious Diseases', 'Infertility', 'Internal Medicine', 'Interventional Neuroradiology', 
            'Interventional Radiology', 'Microbiology', 'Minimally Invasive Surgery', 'Neonatology', 'Nephrology', 'Neurology', 'Neuroradiology', 'Neurosurgery', 
            'Nuclear Medicine', 'OB-GYN Laparoscopy', 'OB-GYN Ultrasound', 'OBGYN Laparoscopy and Hysteroscopy.', 'Obstetric and Gynecology Sonologist', 'Obstetrics and Gynaecology', 
            'Occupational Medicine', 'Ophthalmology', 'Oral and Maxillofacial Surgery', 'Otolaryngology', 'Otolaryngology - Head and Neck Surgery', 'Otolaryngology Head &amp; Neck Surgery', 
            'Otorhinolaryngology', 'Paediatric Allergology', 'Paediatric Endocrinology and Diabetes', 'Paediatric Gastroenterology  Hepatology and Nutrition', 'Paediatric Haematology and Oncology', 
            'Paediatric Infectious Diseases', 'Paediatric Nephrology', 'Paediatric Respiratory Medicine', 'Paediatric Rheumatology', 'Paediatric Surgery', 'Pathology', 'PEDIATRIC NEUROLOGY', 
            'Physical Medicine and Rehabilitation', 'Plastic and Reconstructive', 'Plastic Reconstructive and Aesthetic Surgery', 'Podiatric Medicine', 'Psychiatry', 'Psychological Testing and Assessment', 
            'Public Health', 'Pulmonology', 'Radiology', 'Radiotherapy', 'Rehabilitation Medicine', 'Spine Surgery', 'Sports Medicine', 'Urogynecology', 'Urology', 'Vascular Medicine', 
            'Vascular Surgery'
		];
        
        echo view('/patients/templates/header', $data);
        echo view('/patients/doctors');
        echo view('/patients/templates/footer');
    }

    public function doctor($slug) {
        $userModel = new UserModel();
        $favoriteModel = new FavoriteModel();

        $doctor = $userModel->where('slug', $slug)->join('doctor', 'users.id = doctor.doctorId')->first();
        $favorites = $favoriteModel->select('doctorId')->where('patientId', session()->get('id'))->findAll();

        $data = [
            'metaTitle' => 'Dr '.$doctor['firstName'].' '.$doctor['lastName'].' - DoKonsulta',
            'doctor' => $doctor,
            'favorites' => $favorites
        ];
        
        echo view('/patients/templates/header', $data);
        echo view('/patients/doctor');
        echo view('/patients/templates/footer');
    }

    public function favorites() {
        $userModel = new UserModel();

        $doctors = $userModel->join('doctor', 'doctor.doctorId = users.id')->join('favorites', 'favorites.doctorId = doctor.doctorId')->findAll();

        $data = [
            'metaTitle' => 'My Favorites - DoKonsulta',
            'doctors' => $doctors
        ];

        echo view('/patients/templates/header', $data);
        echo view('/patients/favorites');
        echo view('/patients/templates/footer');

    }

    public function book($slug) {
        $userModel = new UserModel();

        $doctor = $userModel->where('slug', $slug)->join('doctor', 'users.id = doctor.doctorId')->first();

        $data = [
            'metaTitle' => 'Book - DoKonsulta',
            'doctor' => $doctor
        ];
        
        echo view('/patients/templates/header', $data);
        echo view('/patients/book');
        echo view('/patients/templates/footer');
    }

    public function profile() {
        $patientModel = new PatientModel();

        $patient = $patientModel->where('patientId', session()->get('id'))->first();

        $data = [
            'metaTitle' => 'Profile - DoKonsulta',
            'patient' => $patient,
        ];
        
        echo view('/patients/templates/header', $data);
        echo view('/patients/profile');
        echo view('/patients/templates/footer');
    }

    public function deleteFavorite($favoriteId) {
        helper(['url']);
        $favoritedModel = new FavoriteModel();

        $favoritedModel->where('favoriteId', $favoriteId)->delete();

        return redirect()->to('/patients/favorites');
    }
}
