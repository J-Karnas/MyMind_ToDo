<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\MainModel;
use App\Models\ViewTasksModel;
use App\View\View;

class MainController extends AbstractController
{
    public function mainRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->paramView['category'] = $this->category();

            $viewTasks = new ViewTasksModel();
            $mainModel = new MainModel();
            //tasks
            if ($result = $viewTasks->viewTasksMain((int) $_SESSION['userId'])) {
                $this->paramView['tasks'] = $result;
            }
            //Liczba zadań
            if ($result = $mainModel->statsCountTaskToday((int) $_SESSION['userId'])) {
                $this->paramView['stats1'] = $result;
            }else{
                $this->paramView['stats1'] = "-";
            }

            if ($result = $mainModel->statsCountTaskUpcoming((int) $_SESSION['userId'])) {
                $this->paramView['stats2'] = $result;
            }else{
                $this->paramView['stats2'] = "-";
            }

            if ($result = $mainModel->statsCountTaskCompleted((int) $_SESSION['userId'])) {
                $this->paramView['stats3'] = $result;
            }else{
                $this->paramView['stats3'] = "-";
            }
            //Dzisiaj
            if ($result = $mainModel->statsDayTaskCompleted((int) $_SESSION['userId'])) {
                $this->paramView['stats4'] = $result;
            }else{
                $this->paramView['stats4'] = "-";
            }

            if ($result = $mainModel->statsDayTaskUnfinished((int) $_SESSION['userId'])) {
                $this->paramView['stats5'] = $result;
            }else{
                $this->paramView['stats5'] = "-";
            }
            //tydzień
            if ($result = $mainModel->statsWeekTaskCompleted((int) $_SESSION['userId'])) {
                $this->paramView['stats6'] = $result;
            }else{
                $this->paramView['stats6'] = "-";
            }

            if ($result = $mainModel->statsWeekTaskUnfinished((int) $_SESSION['userId'])) {
                $this->paramView['stats7'] = $result;
            }else{
                $this->paramView['stats7'] = "-";
            }
            //miesiąc
            if ($result = $mainModel->statsMonthTaskCompleted((int) $_SESSION['userId'])) {
                $this->paramView['stats8'] = $result;
            }else{
                $this->paramView['stats8'] = "-";
            }

            if ($result = $mainModel->statsMonthTaskUnfinished((int) $_SESSION['userId'])) {
                $this->paramView['stats9'] = $result;
            }else{
                $this->paramView['stats9'] = "-";
            }

            (new View())->viewer("main", $this->paramView);
        } else {
            $this->forwarding("/login");
        }
    }
}
