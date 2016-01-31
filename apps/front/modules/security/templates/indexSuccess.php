<?php 

// apps/frontend/modules/contact/templates/indexSuccess.php ?>
<form action="<?php echo url_for('security/submit') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>