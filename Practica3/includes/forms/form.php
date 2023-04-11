<?php

namespace es\ucm\fdi\aw\forms;

abstract class Form
{
    //  Constants
    public const FORM_ID_KEY = 'formID';
    public const ACTION_KEY = 'action';
    public const METHOD_KEY = 'method';
    public const CLASS_ATTRIBUTE_KEY = 'class';
    public const ENCODE_TYPE_KEY = 'enctype';
    public const URL_REDIRECTION_KEY = 'urlRedireccion';

    private const DEFAULT_OPTIONS = array(
        self::ACTION_KEY => null,
        self::METHOD_KEY => 'POST',
        self::CLASS_ATTRIBUTE_KEY => null,
        self::ENCODE_TYPE_KEY => null,
        self::URL_REDIRECTION_KEY => null
    );

    //  Fields
    protected $m_FormID;
    protected $m_Method;
    protected $m_Action;
    protected $m_ClassAttribute;
    protected $m_EncodeTypeAttribute;
    protected $m_URLRedirection;
    protected $m_Errors;

    //  Constructors
    public function __construct($formID, $options = array())
    {
        $this->m_FormID = $formID;
        $options = array_merge(self::DEFAULT_OPTIONS, $options);

        $this->m_Action = $options[self::ACTION_KEY];
        $this->m_Method = $options[self::METHOD_KEY];
        $this->m_ClassAttribute = $options[self::CLASS_ATTRIBUTE_KEY];
        $this->m_EncodeTypeAttribute = $options[self::ENCODE_TYPE_KEY];
        $this->m_URLRedirection = $options[self::URL_REDIRECTION_KEY];

        if (!$this->m_Action)
            $this->m_Action = htmlspecialchars($_SERVER['REQUEST_URI']);
    }

    //  Methods
    public function handleForm()
    {
        if (strcasecmp('GET', $this->m_Method) == 0)
            $data = &$_GET;
        else
            $data = &$_POST;

        $this->m_Errors = [];

        if (!$this->hasSentForm($data))
            return $this->generateForm($data);

        $this->processForm($data);
        $isValid = count($this->m_Errors) === 0;

        if (!$isValid)
            return $this->generateForm($data);

        if ($this->m_URLRedirection !== null) {
            header("Location: {$this->m_URLRedirection}");
            exit;
        }
    }

    protected abstract function processForm($data);
    protected abstract function generateFormFields($data);

    private function hasSentForm($data)
    {
        return isset($data[self::FORM_ID_KEY]) && $data[self::FORM_ID_KEY] == $this->m_FormID;
    }
    private function generateForm($data)
    {
        $formIDKey = self::FORM_ID_KEY;
        $formFieldsHTML = $this->generateFormFields($data);
        $classAttribute = ($this->m_ClassAttribute != null) ? "class=\"{$this->m_ClassAttribute}\"" : '';
        $encodeTypeAttribute = ($this->m_EncodeTypeAttribute != null) ? "class=\"{$this->m_EncodeTypeAttribute}\"" : '';

        return <<<HTML_FORM
        <form method="{$this->m_Method}" action="{$this->m_Action}" id="{$this->m_FormID}" {$classAttribute} {$encodeTypeAttribute}>
            <input type="hidden" name="$formIDKey" value="{$this->m_FormID}" />
            $formFieldsHTML
        </form>
        HTML_FORM;
    }
}
