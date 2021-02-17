<?php

namespace App\Controllers;

use App\Models\NotificationModel;

class DoctorsAjax extends BaseController
{
    public function notification()
    {
        $notificationModel = new NotificationModel();

        $result = '';
        $notifications = $notificationModel->where('toUser', session()->get('id'))->join('users', 'users.id = notification.fromUser')->orderBy('notification.id', 'DESC')->findAll(10);
        $seen = $notificationModel->where('toUser', session()->get('id'))->where('isSeen', '0')->orderBy('notification.id', 'DESC')->findAll();

        if (count($notifications) > 0) {
            foreach ($notifications as $notif) {
                $result .= '
                    <li class="notification-message"';

                if($notif['isSeen'] == 0) {
                    $result .= 'style="background: #eee;"';
                }
                    
                $result .= '>
                        <a href="activities.html">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="' . $notif['firstName'] . ' ' . $notif['lastName'] . '" src="/assets/img/users/' . $notif['image'] . '" class="img-fluid">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">' . $notif['firstName'] . ' ' . $notif['lastName'] . '</span> '.$notif['message'].'</span></p>
                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                ';
            }
        }

        $output = array(
            'result' => $result,
            'seen' => count($seen)
        );

        echo json_encode($output);
    }
}
