<div class="app-footer text-center">
    <span class="small">© Copyright Alpha Vision. All Rights Reserved</span>
</div>

<div class="whatsapp-container">
    <div class="whatsapp-text">
        <img src="{{ asset('/loginportal/sm-logo.png') }}" class="chat-avatar" alt="Support" />
        <div class="chat-bubble">
            <strong>Need help?</strong><br>
            Chat with your dispatcher
        </div>
        <button class="close-chat-text">&times;</button>
    </div>
    <a href="https://wa.me/0272296438" class="btn btn-success btn-md floating-whatsapp-button">
        <i class="bi bi-whatsapp"></i>
    </a>
</div>

<a href="tel:02 7229 6438" class="floating-call-button btn btn-danger">
    <i class="bi bi-telephone"></i>
</a>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="loginportal/assets/js/jquery.min.js"></script>
<script src="loginportal/assets/js/bootstrap.bundle.min.js"></script>
<script src="loginportal/assets/js/moment.min.js"></script>
<script src="loginportal/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
<script src="loginportal/assets/vendor/overlay-scroll/custom-scrollbar.js"></script>
<script src="loginportal/assets/vendor/apex/apexcharts.min.js"></script>
<script src="loginportal/assets/vendor/apex/custom/home/invoices.js"></script>
<script src="loginportal/assets/vendor/apex/custom/home/deals.js"></script>
<script src="loginportal/assets/vendor/apex/custom/home/tickets.js"></script>
<script src="loginportal/assets/vendor/apex/custom/home/leads.js"></script>
<script src="loginportal/assets/js/custom.js"></script>
<script>
    $(document).ready(function() {
        const $text = $('.whatsapp-text');

        setTimeout(() => {
            $text.css('opacity', '1');
        }, 2000);

        $('.close-chat-text').on('click', function() {
            $text.fadeOut();
        });
    });
</script>

</body>

</html>
