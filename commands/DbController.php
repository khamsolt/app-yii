<?php


namespace app\commands;


use yii\console\Controller;
use yii\helpers\Console;

class DbController extends Controller
{
  public function actionSeed(?string $seederName = null): void
  {
    $seeders = \Yii::$app->params['seeders'] ?? [];
    foreach ($seeders as $seeder) {
      if (class_exists($seeder)) {
        echo "Seeder: $seeder" . PHP_EOL;
        $this->stdout('Starting' . PHP_EOL, Console::FG_YELLOW);
        (new $seeder())->exec();
        $this->stdout('Done' . PHP_EOL, Console::FG_GREEN);
      }
    }
  }
}