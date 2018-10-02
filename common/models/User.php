<?php
namespace common\models;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;
use mdm\admin\models\User as UserModel;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends UserModel
{

  public $currentPassword;
  public $newPassword;
  public $newPasswordConfirm;

  public function rules() {

    $parent_rules =  parent::rules();
    $new_rules = [
      [['newPassword', 'currentPassword', 'newPasswordConfirm'], 'required'],
      [['currentPassword'], 'validateCurrentPassword'],

      [['newPassword', 'newPasswordConfirm'], 'string', 'min' => 3],
      [['newPassword', 'newPasswordConfirm'], 'filter', 'filter' => 'trim'],
      [['newPasswordConfirm'], 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Passwords do not match'],

    ];
   return ArrayHelper::merge($parent_rules, $new_rules);
  }

  public function validateCurrentPassword() {
    if (!$this->verifyPassword($this->currentPassword)) {
      $this->addError('currentPassword', 'Current password incorrect');
    }
  }

  public function verifyPassword($password) {
    $dbpassword = static::findOne(['username' => Yii::$app->user->identity->username, 'status' => self::STATUS_ACTIVE])->password_hash;
    return Yii::$app->security->validatePassword($password, $dbpassword);
  }



}