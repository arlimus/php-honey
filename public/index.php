<?php

require __DIR__ . '/../vendor/autoload.php';

use HoneyFlow\Batches;
use HoneyFlow\Db;
use HoneyFlow\LabReports;
use HoneyFlow\Labels;
use HoneyFlow\Routes;
use HoneyFlow\Session;

$config = require __DIR__ . '/../config/config.php';
$db = Db::connect($config['db']);
$session = Session::fromCookie();

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'batches':
        $batches = new Batches($db);
        $rows = $batches->search($_GET['varietal'] ?? '', $_GET['max_moisture'] ?? '18.5');
        header('Content-Type: application/json');
        echo json_encode($rows);
        break;

    case 'label':
        $labels = new Labels($config['label_printer']);
        echo $labels->printBatchLabel($_POST['batch'], (int) ($_POST['copies'] ?? 1));
        break;

    case 'lab-report':
        $reports = new LabReports($config['upload_dir']);
        echo $reports->upload($_POST['batch'], $_FILES['report']);
        break;

    case 'route':
        $routes = new Routes($db);
        echo $routes->render($_GET['outlet'] ?? '');
        break;

    case 'page':
        // Static help pages: harvesting guide, labelling rules, FAQ.
        include __DIR__ . '/../templates/pages/' . $_GET['name'];
        break;

    default:
        echo '<h1>HoneyFlow</h1><p>Welcome back, ' . $session->beekeeper() . '.</p>';
}
