<?php

declare(strict_types=1);


namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\EmailModel;

class EmailController extends AbstractController
{

    public function notiEveryDay(): string
    {
        $emailModel = new EmailModel();

        if ($returnEmailAndCount = $emailModel->countTaskEveryDay()) {
            foreach ($returnEmailAndCount as $key) {
                if ($returnIdTask = $emailModel->idTaskEveryDay($key)) {
                    $dataEmail = [
                        'type' => "ogółem",
                        'count' => $key['tasks_value'],
                        'name' => $key['username'],
                        'titleTasks' => $returnIdTask,
                        'link' => "http://mymaind.local/viewTasks"
                    ];

                    $return = $this->sendNotificationEmail($key['email'], $dataEmail);

                    foreach ($returnIdTask as $key2) {
                        $emailModel->updateLastRem($key2);
                    }
                } else {
                    return "nie udało się pobrać id zadania";
                }
            }
        } else {
            return "Nie udało się pobrać zadań";
        }
        return "Wiadomości zostały wysłane" . $return;
    }

    public function remindOnThisDay(): string
    {
        $emailModel = new EmailModel();

        if ($returnEmailAndCount = $emailModel->countTaskOnThisDay()) {
            foreach ($returnEmailAndCount as $key) {
                if ($returnIdTask = $emailModel->dataTaskOnThisDay($key)) {

                    $dataEmail = [
                        'type' => "dzisiaj",
                        'name' => $key['username'],
                        'count' => $key['tasks_value'],
                        'titleTasks' => $returnIdTask,
                        'link' => "http://mymaind.local/viewTasks"
                    ];

                    $return = $this->sendReminderEmail($key['email'], $dataEmail);

                    foreach ($returnIdTask as $key2) {
                        $emailModel->updateLastRem($key2);
                    }
                } else {
                    return "nie udało się pobrać id zadania";
                }
            }
        } else {
            return "Nie udało się pobrać zadań";
        }
        return "Wiadomości zostały wysłane" . $return;
    }

    public function remindDayBeforeEnd(): string
    {
        $emailModel = new EmailModel();

        if ($returnEmailAndCount = $emailModel->countTaskDayBeforeEnd()) {
            foreach ($returnEmailAndCount as $key) {
                if ($returnIdTask = $emailModel->dataTaskDayBeforeEnd($key)) {

                    $dataEmail = [
                        'type' => "jutro",
                        'name' => $key['username'],
                        'count' => $key['tasks_value'],
                        'titleTasks' => $returnIdTask,
                        'link' => "http://mymaind.local/viewTasks"
                    ];

                    $return = $this->sendReminderEmail($key['email'], $dataEmail);

                    foreach ($returnIdTask as $key2) {
                        $emailModel->updateLastRem($key2);
                    }
                } else {
                    return "nie udało się pobrać id zadania";
                }
            }
        } else {
            return "Nie udało się pobrać zadań";
        }
        return "Wiadomości zostały wysłane" . $return;
    }

    public function notiEveryTwoDays(): string
    {
        $emailModel = new EmailModel();

        if ($returnEmailAndCount = $emailModel->countTaskEveryTwoDays()) {
            foreach ($returnEmailAndCount as $key) {
                if ($returnIdTask = $emailModel->dataTaskEveryTwoDays($key)) {

                    $dataEmail = [
                        'type' => "wysyłane co dwa dni",
                        'name' => $key['username'],
                        'count' => $key['tasks_value'],
                        'titleTasks' => $returnIdTask,
                        'link' => "http://mymaind.local/viewTasks"
                    ];

                    $return = $this->sendNotificationEmail($key['email'], $dataEmail);

                    foreach ($returnIdTask as $key2) {
                        $emailModel->updateLastRem($key2);
                    }
                } else {
                    return "nie udało się pobrać id zadania";
                }
            }
        } else {
            return "Nie udało się pobrać zadań";
        }
        return "Wiadomości zostały wysłane" . $return;
    }

    public function notiEveryWeek(): string
    {
        $emailModel = new EmailModel();

        if ($returnEmailAndCount = $emailModel->countTaskEveryWeek()) {
            foreach ($returnEmailAndCount as $key) {
                if ($returnIdTask = $emailModel->dataTaskEveryWeek($key)) {

                    $dataEmail = [
                        'type' => "wysyłane co tydzień",
                        'name' => $key['username'],
                        'count' => $key['tasks_value'],
                        'titleTasks' => $returnIdTask,
                        'link' => "http://mymaind.local/viewTasks"
                    ];

                    $return = $this->sendNotificationEmail($key['email'], $dataEmail);

                    foreach ($returnIdTask as $key2) {
                        $emailModel->updateLastRem($key2);
                    }
                } else {
                    return "nie udało się pobrać id zadania";
                }
            }
        } else {
            return "Nie udało się pobrać zadań";
        }
        return "Wiadomości zostały wysłane" . $return;
    }
}
