<?php

class SettingsController extends BaseController
{

    public function actionIndex()
    {
        $model = Users::model()->findByPk(Yii::app()->user->id);
        $model->scenario = 'settings';
        $form = new CForm('application.modules.users.forms.SettingsForm', $model);

        if ($form->submitted() && $form->validate())
        {
            $image = CUploadedFile::getInstance($model, 'image');
            if ($image != null)
            {
                
                $image->saveAs(Yii::app()->basePath . '/../uploads/users/avatars/' . $model->id . '.' . $image->extensionName);
                $model->photo = '/uploads/users/avatars/' . $model->id . '.' . $image->extensionName;
            }
            
            $model->save();

            Yii::app()->user->setFlash('success', "Настройки сохраненны!");
            $this->refresh();
        }

        $this->render('index', array(
            'form' => $form,
        ));
    }


}