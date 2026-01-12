@include('home.header')

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 order-lg-last hero-img aos-init aos-animate" data-aos="zoom-out">
            <img src="assets/img/phone_1.png" alt="Phone 1" class="phone-1">
            <img src="assets/img/phone_2.png" alt="Phone 2" class="phone-2">
          </div>
          <div class="col-lg-8 d-flex flex-column justify-content-center align-items text-center text-md-start aos-init aos-animate" data-aos="fade-up">
            <h2>Banking Made Simple, Secure, and Smart.</h2>
            <p>Your reliable partner in digital finance</p>
            <div class="d-flex mt-4 justify-content-center justify-content-md-start">
              <a href="{{ route('show.register') }}" class="download-btn"><span>Get Started</span></a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">
          <div class="col-xl-5 content">
            <h3>About Us</h3>
            <h2>Empowering Your Financial Future</h2>
            <p>At Fundclaim Bank, we believe banking should be simple, secure, and centered around you. Our mission is to provide modern financial solutions that empower individuals, families, and businesses to thrive. From savings to investments, we combine innovation with integrity to help you achieve financial peace of mind.</p>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">
              <div class="col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Smart Banking Solutions</h3>
                  <p>We offer innovative digital banking tools designed to simplify your financial life. With our intuitive online platforms, you can manage accounts, transfer funds, and access personalized insights — all from the comfort of your home or on the go.</p>
                </div>
              </div>
              <div class="col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>Trusted &amp; Secure</h3>
                  <p>Your security is our top priority. Fundclaim Bank uses cutting-edge encryption, fraud monitoring, and multi-factor authentication to protect your data and assets. With us, you can bank confidently knowing your information is safe and private.</p>
                </div>
              </div>
              <div class="col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>Personalized Customer Support</h3>
                  <p>We understand that every customer is unique. Our dedicated support team is always ready to assist — whether you need help opening an account, applying for a loan, or planning your finances. Experience real support from people who care.</p>
                </div>
              </div>
              <div class="col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Financial Growth &amp; Guidance</h3>
                  <p>We’re more than a bank — we’re your financial partner. Fundclaim Bank provides expert advice, smart investment options, and educational resources to help you make informed decisions and grow your wealth sustainably.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    <!-- Featured Section -->
    <section id="featured" class="featured section">
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Save Time. Bank Smarter with Fundclaim Bank</h2>
        <p>Experience seamless banking designed for your lifestyle - fast, secure, and effortless.</p>
      </div>
      <div class="container">
        <div class="row gy-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="col-md-4">
            <div class="card">
              <div class="img">
                <img src="assets/img/cards-4.png" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-hdd-stack"></i></div>
              </div>
              <h2 class="title">Manage Your Finances Easily</h2>
              <p>Take full control of your money with Fundclaim Bank’s smart dashboard. Track your spending, monitor transactions, and manage all your accounts in one secure, easy-to-use place. Stay organized and confident about where your money goes — every day.</p>
            </div>
          </div>
          <div class="col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="img">
                <img src="assets/img/cards-2.png" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
              </div>
              <h2 class="title">Smarter Banking Insights</h2>
              <p>Get the clarity you need to make better financial decisions. Our intelligent analytics tools visualize your income, expenses, and savings goals — giving you actionable insights to grow your wealth and achieve your goals faster.</p>
            </div>
          </div>
          <div class="col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="img">
                <img src="assets/img/cards-6.png" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
              </div>
              <h2 class="title">From Savings to Success</h2>
              <p>Whether you’re starting small or planning for the future, Fundclaim Bank supports your journey with tailored savings plans, loans, and investment options. We turn your financial goals into achievable milestones — from vision to reality.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Featured Section -->

    <!-- Cards Section -->
    <section id="cards" class="cards section">
      <div class="container">
        <div class="text-center mb-4 steps-img aos-init aos-animate" data-aos="zoom-out">
          <img src="assets/img/steps.svg" alt="">
        </div>
        <div class="row gy-4">
          <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <span>01</span>
              <h4>
    <a href="https://auctions.vaulta-bank.com/" class="stretched-link">Asset Auctions
    </a>
</h4>
              <p>Access exclusive bank-managed asset auctions including vehicles, properties, and other high-value items. Enjoy transparent bidding, verified listings, and secure transactions — giving you more opportunities to invest wisely.</p>
            </div>
          </div>
          <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="card-item">
              <span>02</span>
              <h4><a href="#" class="stretched-link">Apply For a Platinum ATM Card</a></h4>
              <p>Upgrade your banking experience with the Fundclaim Bank Platinum Card. Enjoy higher withdrawal limits, zero annual fees, and premium access to global ATMs and online payment platforms — designed for convenience and status.</p>
            </div>
          </div>
          <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="card-item">
              <span>03</span>
              <h4><a href="#" class="stretched-link">Learn about our Bitcoin Investment Program</a></h4>
              <p>Explore the future of finance with Fundclaim Bank’s secure cryptocurrency investment options. Learn, invest, and grow your digital assets with expert insights and cutting-edge technology — safely managed under regulated systems.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Cards Section -->

    <!-- Features Section - Open Account (Button Changed ONLY) -->
    <section id="features" class="features section">
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Open Account</h2>
        <p>Join thousands of satisfied customers who trust Fundclaim Bank for fast, secure, and flexible banking. Open your account online in minutes — no paperwork, no waiting.</p>
        <p style="margin-top: 50px; text-align: center;">
          <a href="sign-up/index.html">
            <button class="open-account-btn">Start your financial journey today</button>
          </a>
        </p>
      </div>
    </section><!-- /Features Section -->

    <!-- Pricing Section - Login (100% ORIGINAL - NO CHANGES) -->
    <section id="pricing" class="pricing section">
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Login</h2>
        <p>Access your Fundclaim Bank account anytime, anywhere. Manage your funds, make transfers, and stay on top of your finances with our easy-to-use online platform.</p>
      </div>
      <div class="container aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
        <div class="row g-4">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="pricing-item featured">
              <h3>Sign in securely to continue</h3>
              <div class="icon">
                <i class="bi bi-lock" aria-hidden="true"></i>
              </div>
              <form>
                <div class="text-center"><a href="login/index.html" class="buy-btn">Account Dashboard</a></div>
              </form>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
      </div>
    </section><!-- /Pricing Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Contact</h2>
        <p>We're Here to Help You - Anytime, Anywhere. Your Satisfaction is Our Priority.</p>
      </div>
      <div class="container aos-init aos-animate" data-aos="fade" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
            
            <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>support@fundclaimbnk.com</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <form action="#" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->

  </main>

@include('home.footer')