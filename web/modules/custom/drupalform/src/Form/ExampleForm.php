<?php
/**
* @file
* Contains \Drupal\drupalform\Form\ExampleForm.
**/
namespace Drupal\drupalform\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends ConfigFormBase {
    /**
    * {@inheritdoc}
    */
    protected function getEditableConfigNames() {
        return ['drupalform.company'];
    }

    /**
    * {@inheritdoc}
    */
    public function getFormId() {
        return 'drupalform_example_form';
    }
    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state) {
        // Return array of Form API elements.
        $form['company_name'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Company name'),
            '#default_value' => $this->config('drupalform.company')->get('company_name'),
            );
        return parent::buildForm($form, $form_state);
    }
    /**
    * {@inheritdoc}
    */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        // Validation covered in later recipe, required to satisfy interface
        if (!$form_state->isValueEmpty('company_name')) {
            // Value is set, perform validation
            if (strlen($form_state->getValue('company_name')) <= 5) {
                // Set validation error.
                $form_state->setErrorByName('company_name', t('Company name is less than 5 characters'));
            }
        }
    }
    /**
    * {@inheritdoc}
    */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        parent::submitForm($form, $form_state);
        $this->config('drupalform.company')->set('name', $form_state->getValue('company_name'));
    }
}