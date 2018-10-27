<?php if($data) : ?>
    <p class="fastbreak-notification <?php echo $data['status']; ?>"><?php echo $data['msg']; ?></p>
<?php endif; ?>