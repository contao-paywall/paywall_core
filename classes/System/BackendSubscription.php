<?php

namespace Subscription\Classes;

class BackendSubscription extends \Backend
{
	public function __construct()
	{
		parent::__construct();
	}

	public function syncSubscription()
	{
		$this->Import('Subscription\Classes\Job', 'Job');
		$this->Job->syncSubscription();
		$this->redirect(str_replace('&key=setGrp', '', \Environment::get('request')));
	}


	public function importSubscription()
	{
		if (\Input::get('key') != 'importSubscription')
		{
			return '';
		}

		$this->import('BackendUser', 'User');
		$class = $this->User->uploader;

		if (!class_exists($class) || $class == 'DropZone')
		{
			$class = 'FileUpload';
		}

		$objUploader = new $class();

		if (\Input::post('FORM_SUBMIT') == 'tl_import_subscription')
		{
			$arrUploaded = $objUploader->uploadTo('system/tmp');

			if (empty($arrUploaded))
			{
				\Message::addError($GLOBALS['TL_LANG']['ERR']['all_fields']);
				$this->reload();
			}

			foreach ($arrUploaded as $strCsvFile)
			{
				$objFile = new \File($strCsvFile, true);

				if ($objFile->extension != 'csv')
				{
					\Message::addError(sprintf($GLOBALS['TL_LANG']['ERR']['filetype'], $objFile->extension));
					continue;
				}

				$lines = file($strCsvFile);
				if(is_array($lines))
				{
					foreach($lines as $v)
					{

					}
				}
			}

			\Message::addConfirmation(sprintf($GLOBALS['TL_LANG']['tl_newsletter_recipients']['confirm'], $intTotal));

			if ($intInvalid > 0)
			{
				\Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_newsletter_recipients']['invalid'], $intInvalid));
			}

			\System::setCookie('BE_PAGE_OFFSET', 0, 0);
			$this->reload();
		}


		$objTemplate = new \BackendTemplate('import_subscription');
		$objTemplate->backBTN_url  = ampersand(str_replace('&key=importSubscription', '', \Environment::get('request')));
		$objTemplate->backBTN_lang = $GLOBALS['TL_LANG']['MSC']['backBT'];
		$objTemplate->Message      = \Message::generate();
		$objTemplate->Uploader     = $objUploader->generateMarkup();

		return $objTemplate->parse();
	}
}