<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PatientModel;
use App\Models\AppointmentModel;
use App\Models\FavoriteModel;

class Physicians extends BaseController
{
    public function dashboard()
    {
        $data = [
            'metaTitle' => 'Dashboard - DoKonsulta'
        ];

        echo view('/doctors/templates/header', $data);
        echo view('/doctors/dashboard');
    }

    public function appointments()
    {
        $appointmentModel = new AppointmentModel();
        $today = $appointmentModel->select('appointment.status, appointment.type, users.firstName, users.lastName, appointment.clinicId, appointment.created, appointment.id, users.image, 
                                    appointment.date, users.birthday')
            ->like('date', date('Y-m-d'))->where('doctorId', session()->get('id'))->where('appointment.status', 'approved')
            ->join('users', 'users.id = appointment.patientId')->findAll();
        $next = $appointmentModel->select('appointment.status, appointment.type, users.firstName, users.lastName, appointment.clinicId, appointment.created, appointment.id, users.image, 
                                    appointment.date, users.birthday')
            ->where('SUBSTRING(date, 1, 10) >', date('Y-m-d'))->where('doctorId', session()->get('id'))->join('users', 'users.id = appointment.patientId')
            ->orderBy('appointment.status ASC, appointment.date, users.birthday ASC')->findAll();
        $history = $appointmentModel->select('appointment.status, appointment.type, users.firstName, users.lastName, appointment.clinicId, appointment.created, appointment.id, users.image, 
                                    appointment.date')
            ->where('date <', date('Y-m-d'))->where('doctorId', session()->get('id'))->where('appointment.status', 'approved')
            ->join('users', 'users.id = appointment.patientId')->orderBy('date', 'desc')->findAll();
        $data = [
            'metaTitle' => 'Appointments - DoKonsulta',
            'today' => $today,
            'next' => $next,
            'history' => $history
        ];

        echo view('/doctors/templates/header', $data);
        echo view('/doctors/appointments');
        echo view('/doctors/templates/footer');
    }
}
