<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timesheets".
 *
 * @property int $id
 * @property string $title
 * @property string $started
 * @property string $finished
 * @property string $total_time
 * @property string $comments
 * @property int $client_id
 * @property int $user_id 
 *
 * @property Clients $client
 * @property User $user 
 */
class Timesheets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timesheets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'started', 'finished', 'client_id'], 'required'],
            [['started', 'finished'], 'safe'],
            [['comments'], 'string'],
            [['client_id'], 'integer'],
            [['title', 'total_time'], 'string', 'max' => 128],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'started' => 'Started',
            'finished' => 'Finished',
            'total_time' => 'Total Time',
            'comments' => 'Comments',
            'client_id' => 'Client',
            'user_id' => 'User ID', 
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    //custom beforeSave
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $diff = strtotime($this->finished) - strtotime($this->started);
        //$diff = $this->finished->diff($this->started);
        $this->total_time = gmdate("H:i:s", $diff);
        $this->user_id = Yii::$app->user->identity->id;
        //$diff->format('%i minutes %s seconds');
        // var_dump(Yii::$app->user->identity->username);
        // die();
        return true;
    }
}
