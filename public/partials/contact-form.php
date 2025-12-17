<!-- Contact Start -->
<div class="contact wow fadeInUp" data-wow-delay="0.1s" id="contact">
    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4"></div>

                <div class="col-md-8">
                    <div class="contact-form">
                        <h4 class="text-white mb-4">
                            Have a project in mind or want to collaborate?
                            Feel free to reach out — I usually reply within a few hours.
                        </h4>

                        <form id="contactForm" novalidate>
                            <div class="mb-3">
                                <input type="text" class="form-control"
                                       name="name" placeholder="Your Name" required>
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control"
                                       name="email" placeholder="Your Email" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control"
                                       name="subject" placeholder="Subject" required>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control"
                                          name="message" placeholder="Message"
                                          rows="6" required></textarea>
                            </div>

                            <div style="margin-top:10px;">
                                <button class="btn" type="submit" id="sendBtn">
                                    Send Message
                                </button>
                                <span id="formMessage"
                                      style="margin-left:15px;color:#fff;"></span>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('contactForm');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const btn = form.querySelector('#sendBtn');
        const msg = form.querySelector('#formMessage');

        btn.disabled = true;
        msg.innerHTML = 'Sending...';

        const formData = new FormData(form);

        fetch('/send_mail.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                msg.innerHTML = '✅ Message sent successfully!';
                form.reset();
            } else {
                msg.innerHTML = '❌ ' + data.message;
            }
        })
        .catch(() => {
            msg.innerHTML = '❌ Something went wrong!';
        })
        .finally(() => {
            btn.disabled = false;
        });
    });

});
</script>
