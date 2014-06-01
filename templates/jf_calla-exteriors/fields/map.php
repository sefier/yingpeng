<?php
defined('_JEXEC') or die( 'Restricted access' );
class JFormFieldMap extends JFormField
{	
	var	$_name = 'Map';

	function getInput()
	{
		return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
	}

	function fetchElement($name, $value, &$node, $control_name)
	{
		
		$data = $this->form->getValue('params');
		$moduleParams = new JRegistry($data);

		//$longlat 	= $moduleParams->get('latitude', '');
		
		ob_start();
		?>
		<?php		        
        $content=ob_get_contents();
        ob_end_clean();
        return $content;
	}
}
