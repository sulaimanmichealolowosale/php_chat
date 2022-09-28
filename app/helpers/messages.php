<?php if (isset($_SESSION['message'])) : ?>
    <p class="text-center text-success"><?php echo $_SESSION['message'] ?></p>
    <?php unset($_SESSION['message']) ?>
<?php endif; ?>