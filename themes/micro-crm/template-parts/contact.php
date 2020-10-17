 <?php
 /*
  Template Name: Contact Page
 */
 ?>
 
 <?php get_header(); ?>

 <!-- Section A: Contact Form -->
 <section id="contact-a" class="text-center py-3">
    <div class="container">
      <h2 class="section-title">Contact</h2>
      <div class="bottom-line"></div>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
      <br/>
      <form>
        <div class="text-fields">
        
          <input type="text" class="text-input email-input" placeholder="Courriel">
          <input type="text" class="text-input phone-input" placeholder="Phone">
          <textarea class="text-input message-input" placeholder="Message"></textarea>
        </div>
        <button type="submit" class="btn-dark">Submit</button>
      </form>
    </div>
  </section>

  <!-- Section B: Contact Info -->
  <section id="contact-b" class="py-3">
    <div class="container">
      <div class="contact-info">
        <div>
          <i class="fa fa-phone fa-2x"></i>
          <h3>Phone</h3>
          <p>+1 (418) 555-5555</p>
        </div>

        <div>
          <i class="fa fa-envelope fa-2x"></i>
          <h3>Email</h3>
          <p>info@micro-crm.com</p>
        </div>

        <div>
          <i class="fa fa-address-card fa-2x"></i>
          <h3>Address</h3>
          <p>Québec (QC), Canada</p>
        </div>
      </div>
    </div>
  </section>


  <?php get_footer(); ?>
