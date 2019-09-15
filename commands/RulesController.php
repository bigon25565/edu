<?php


namespace app\commands;

use yii\helpers\Console;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\rbac\Role;

class RulesController extends Controller {

	public function actionIndex() {
		$connection = \Yii::$app->getDb();
		$command    = $connection->createCommand( "
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) 
VALUES ('teacher', '1', 'teacher', NULL, NULL, NULL, NULL);");

		if ( $command->execute() ) {
			$this->stdout( "Why not? Teacher role is ready\n", Console::BOLD );

			return ExitCode::OK;
		}

		return ExitCode::UNSPECIFIED_ERROR;
	}
}