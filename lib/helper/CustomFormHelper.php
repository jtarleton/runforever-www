<?php

//Renders a symfony sfForm object for Twitter's Bootstrap framework: 
//http://twitter.github.com/bootstrap/


function printAsBootstrapForm(sfForm $sfForm, sfFormField $sfFormFieldObj)
{

	if( $sfForm->isBound() )
	{
		if(!$sfFormFieldObj->isHidden())
		{

			if( $sfFormFieldObj->hasError())
			{
				// With red "error" styles
				?>
			    <div class="control-group error">
				    <label class="control-label" for="inputError"><?php echo $sfFormFieldObj->renderLabel() ?></label>
				    <div class="controls">
				    <?php echo str_replace(PHP_EOL,'<br />', $sfFormFieldObj->render()); ?>
				    <span class="help-inline"><?php echo $sfFormFieldObj->renderError(); ?></span>
				    </div>
			    </div>

			    <?php
			}
			elseif(in_array($sfFormFieldObj->getName(), array_keys($sfForm->getErrorSchema()->getNamedErrors())))
			{
				// With red "error" styles
				$n = $sfFormFieldObj->getName();
				$objs = $sfForm->getErrorSchema()->getNamedErrors();
				?>
				<div class="control-group error">
				    <label class="control-label" for="inputError"><?php echo $sfFormFieldObj->renderLabel() ?></label>
				    <div class="controls">
				    <?php echo str_replace(PHP_EOL,'<br />', $sfFormFieldObj->render()); ?>
				    <span class="help-inline"><?php if($objs[$n] instanceof sfValidatorError):

				    	echo $objs[$n]->getMessage();
				    else:

				    echo $objs[$n]->current()->__toString();

				    endif; ?></span>
				    </div>
			    </div>
				<?php
			}
			else
			{
				// With green "success" styles
				?>

			    <div class="control-group success">
				    <label class="control-label" for="inputSuccess"><?php echo $sfFormFieldObj->renderLabel() ?></label>
				    <div class="controls">
				     <?php echo str_replace(PHP_EOL,'<br />', $sfFormFieldObj->render()) ?>
				    <span class="help-inline"></span>
				    </div>
			    </div><?php
			}
		}
	}
	else
	{
		if(!$sfFormFieldObj->isHidden())
		{
			// au naturel
			?>
			<div class="control-group">
				<label class="control-label" for=""><?php echo $sfFormFieldObj->renderLabel() ?></label>
				<div class="controls">
				<?php echo str_replace(PHP_EOL,'<br />', $sfFormFieldObj->render()) ?>
				</div>
			</div><?php
		}
	}
}
