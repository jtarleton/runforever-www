<?php
/* 

A decaffeinated version of my tbsFormRender helper function

Renders a symfony sfForm object for Twitter's Bootstrap framework: 

  http://twitter.github.com/bootstrap/



            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Text input">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" disabled placeholder="Text input">
              </div>
            </div>









*/
function printAsBootstrapForm(sfForm $sfForm, sfFormField $sfFormFieldObj, $labels=false)
{

	if( $sfForm->isBound() )
	{




	





		if(!$sfFormFieldObj->isHidden() )
		{

			if($sfFormFieldObj->hasError())
			{
				// With red "error" styles
				?>
			    <div class="form-group has-error has-feedback">


				    <?php if( $labels){ ?>

				    <label class="control-label" for="inputSuccess"><?php echo $sfFormFieldObj->renderLabel() ?></label>

				    <?php } ?>

				    <div class="controls col-md-12"><span class="help-inline"><?php echo $sfFormFieldObj->renderError(); ?></span>
				    <?php echo str_replace(PHP_EOL,'<br />', $sfFormFieldObj->render()); ?>
				    
				    </div>
			    </div>

			    <?php
			}
			elseif( ( in_array($sfFormFieldObj->getName(), array_keys($sfForm->getErrorSchema()->getNamedErrors()))))
			{
				// With red "error" styles
				$n = $sfFormFieldObj->getName();
				$objs = $sfForm->getErrorSchema()->getNamedErrors();
				?>
				<div class="form-group has-error has-feedback">



				 <?php if( $labels){ ?>

				    <label class="control-label" for="inputSuccess"><?php echo $sfFormFieldObj->renderLabel() ?></label>

				    <?php } ?>

				    <div class="controls col-md-12">


<span class="help-inline"><?php if($objs[$n] instanceof sfValidatorError):

				    	echo $objs[$n]->getMessage();
				    else:

				    echo $objs[$n]->current()->__toString();

				    endif; ?></span>





				    <?php echo str_replace(PHP_EOL,'<br />', $sfFormFieldObj->render()); ?>
				    
				    </div>
			    </div>
				<?php
			}
			else
			{
				// With green "success" styles
				?>

			    <div class="form-group has-success has-feedback">
				    <?php if( $labels){ ?>

				    <label class="control-label" for="inputSuccess"><?php echo $sfFormFieldObj->renderLabel() ?></label>

				    <?php } ?>
				    <div class="controls col-md-12"><span class="help-inline"></span>
				     <?php echo str_replace(PHP_EOL,'<br />', $sfFormFieldObj->render()) ?>
				    
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


 			<div class="row">
              <div class="col-md-12">



              	<?php if( $labels){ ?>

				    <label class="control-label" for="inputSuccess"><?php echo $sfFormFieldObj->renderLabel() ?></label>

				    <?php } ?>

			
				
				<?php echo str_replace(PHP_EOL,'<br />', $sfFormFieldObj->render()) ?>
				
				</div>
			</div>

			<?php
		}
	}
}
