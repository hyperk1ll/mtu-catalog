
  <!-- Favicons -->
  <link href="{{asset('/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="{{asset('/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  
  
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Feel free to contact us</p>
      </div>

      <div class="row">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Gedung East Square Lt. 1, Jl. Pemuda No. 65 Rawamangun, Jakarta Timur, 13220</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>marketing@mahirtekno.co.id</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>021-2247 1134</p>
            </div>

            <iframe width="770" height="510" id="gmap_canvas" src="https://maps.google.com/maps?q=Gedung East Square Lt. 1, Jl. Pemuda No. 65 Rawamangun, Jakarta Timur, 13220&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>

        </div>

        @if(Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
        @endif
        @if(isset($status) && $status === 'success')
    <div class="alert alert-success">
        {{ $message }}
    </div>
@elseif(isset($status) && $status === 'error')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@endif

<div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
    <form id="myForm" action="{{ route('send.email') }}" method="POST" role="form" class="php-email-form">
        @csrf
        <input type="hidden" name="text" id="mailgunText" value="">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
        </div>
        <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary" id="sendMessageButton">Send Message</button>
        </div>
    </form>
</div>

<script defer>
    document.getElementById('sendMessageButton').addEventListener('click', function () {
        prepareAndSubmit();
    });

    function prepareAndSubmit() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var subject = document.getElementById('subject').value;
        var message = document.getElementById('message').value;

        // Form validation (you may want to add more validation)
        if (!name || !email || !subject || !message) {
            alert('Please fill in all fields.');
            return;
        }

        // Set values for Mailgun API
        document.getElementById('mailgunText').value = message + ' sent by ' + email;

        // Log to console to check if the function is being called
        console.log('Preparing and submitting...');

        // Submit the form
        document.getElementById('myForm').submit();

        // alert in case the form submission is successful
        alert('Thank you for your message. We will get back to you soon.');

        // redirect to homepage
        window.location.href = '/';

    }
</script>
