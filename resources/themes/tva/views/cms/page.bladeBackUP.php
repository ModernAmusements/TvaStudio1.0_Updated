@extends('shop::layouts.masterBreadCrumb')

@section('page_title')
    {{ $page->page_title }}
@endsection

@section('seo')
    <meta name="title" content="{{ $page->meta_title }}" />

    <meta name="description" content="{{ $page->meta_description }}" />

    <meta name="keywords" content="{{ $page->meta_keywords }}" />
@endsection

@section('content-wrapper')

<div class="container-fluid">
      <div class="col-left">
        <div class="about-intro box">
          <p class="medium">We Are</p>
          <h2>
            A contemporary label committed to a clear state-of-mind, enabling
            you to focus on what matters by designing simplistic objects and
            for every day use.
          </h2>
        </div>
        <div class="about-nav box">
          <div class="btn-toggle" data-toggle="#faq">
            <h3>FAQ</h3>
            </div>
          <div class="btn-toggle" data-toggle="#contact">
            <h3>Contact</h3>
          </div>
          <div class="btn-toggle" data-toggle="#returnPolicy">
            <h3>Return Policy</h3>
         </div>
         <div class="btn-toggle" data-toggle="#refundPolicy">
            <h3>Refund Policy</h3>
         </div>
         <div class="btn-toggle" data-toggle="#datenschutz">
            <h3>Datenschutz</h3>
         </div>
         <div class="btn-toggle" data-toggle="#agb">
            <h3>AGB</h3>
         </div>
        </div>

        <div id="faq" class="popup popup-50">
          <div class="btn-close">close</div>
          <h2 class="singe-line">FAQ</h2>
          <div class="popup-content">
            <div class="col">
              <div class="tabs">
                <div class="tab">
                  <input type="radio" id="rd1" name="rd" />
                  <label class="tab-label" for="rd1"
                    >How often do you restock?</label
                  >
                  <div class="tab-content">
                    A contemporary label committed to a clear state-of-mind,
                    enabling you to focus on what matters by designing
                    simplistic objects and for every day use.
                  </div>
                </div>
                <div class="tab">
                  <input type="radio" id="rd2" name="rd" />
                  <label class="tab-label" for="rd2"
                    >How can I sign up?</label
                  >
                  <div class="tab-content">
                    To help you with our online sign-up process,
                    we'll set up an appointment to chat on the phone.
                    We can answer any questions you might have, and guide you through the steps, one at a time.
                  </div>
                </div>
                <div class="tab">
                    <input type="radio" id="rd3" name="rd" />
                    <label class="tab-label" for="rd3"
                      >What happens if I leave?</label
                    >
                    <div class="tab-content">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Nihil, aut.
                    </div>
                  </div>
                  <div class="tab">
                    <input type="radio" id="rd4" name="rd" />
                    <label class="tab-label" for="rd4"
                      >How often do premiums increase?</label
                    >
                    <div class="tab-content">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Nihil, aut.
                    </div>
                  </div>
                  <div class="tab">
                    <input type="radio" id="rd5" name="rd" />
                    <label class="tab-label" for="rd5"
                      >Can I sign up from abroad?</label
                    >
                    <div class="tab-content">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Nihil, aut.
                    </div>
                  </div>
                  <div class="tab">
                    <input type="radio" id="rd6" name="rd" />
                    <label class="tab-label" for="rd6"
                      >What happens if I leave?</label
                    >
                    <div class="tab-content">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Nihil, aut.
                    </div>
                  </div>
                  <div class="tab">
                    <input type="radio" id="rd7" name="rd" />
                    <label class="tab-label" for="rd7"
                      >Why is the Expat tariff cheaper?</label
                    >
                    <div class="tab-content">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Nihil, aut.
                    </div>
                  </div>
                  <div class="tab">
                    <input type="radio" id="rd8" name="rd" />
                    <label class="tab-label" for="rd8"
                      >How can I cancel my current insurance?</label
                    >
                    <div class="tab-content">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Nihil, aut.
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div id="returnPolicy" class="popup popup-50">
          <div class="btn-close">close</div>
          <h2 class="singe-line">Return Policy</h2>
          <div class="popup-content-text">
            <p>
              PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
              response, we are not allowing exchanges or returns at this time.
              Orders purchased during this time may be delayed due to business
              interruptions due to local regulations regarding Covid-19. We
              appreciate your patience and understanding at this time.
              SHIPPING: Please allow up to 3-10 business days for your order
              to be shipped. You will get a shipping confirmation via email
              with tracking information as soon as it’s available.
              INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
              do reserve the right to cancel and refund any order that is
              deemed potentially fraudulent by our payment system.
              International shipping prices vary by country and the weight of
              your order. Peace & Quiet does not take any responsibility for
              any customs charges, fees, etc. Customs charges are different
              for every country. We do our best to mark your order as a gift
              but sometimes we have no control over customs charging taxes and
              fees. All sales are final, however if you receive the wrong
              item/size from what was ordered, please notify us in a timely
              manner. We are not responsible for lost or stolen packages. For
              any inquires regarding an order, please contact our customer
              service via email.
              PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
              response, we are not allowing exchanges or returns at this time.
              Orders purchased during this time may be delayed due to business
              interruptions due to local regulations regarding Covid-19. We
              appreciate your patience and understanding at this time.
              SHIPPING: Please allow up to 3-10 business days for your order
              to be shipped. You will get a shipping confirmation via email
              with tracking information as soon as it’s available.
              INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
              do reserve the right to cancel and refund any order that is
              deemed potentially fraudulent by our payment system.
              International shipping prices vary by country and the weight of
              your order. Peace & Quiet does not take any responsibility for
              any customs charges, fees, etc. Customs charges are different
              for every country. We do our best to mark your order as a gift
              but sometimes we have no control over customs charging taxes and
              fees. All sales are final, however if you receive the wrong
              item/size from what was ordered, please notify us in a timely
              manner. We are not responsible for lost or stolen packages. For
              any inquires regarding an order, please contact our customer
              service via email.
              PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
              response, we are not allowing exchanges or returns at this time.
              Orders purchased during this time may be delayed due to business
              interruptions due to local regulations regarding Covid-19. We
              appreciate your patience and understanding at this time.
              SHIPPING: Please allow up to 3-10 business days for your order
              to be shipped. You will get a shipping confirmation via email
              with tracking information as soon as it’s available.
              INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
              do reserve the right to cancel and refund any order that is
              deemed potentially fraudulent by our payment system.
              International shipping prices vary by country and the weight of
              your order. Peace & Quiet does not take any responsibility for
              any customs charges, fees, etc. Customs charges are different
              for every country. We do our best to mark your order as a gift
              but sometimes we have no control over customs charging taxes and
              fees. All sales are final, however if you receive the wrong
              item/size from what was ordered, please notify us in a timely
              manner. We are not responsible for lost or stolen packages. For
              any inquires regarding an order, please contact our customer
              service via email.
            </p>
          </div>
        </div>


        <div id="refundPolicy" class="popup popup-50">
            <div class="btn-close">close</div>
            <h2 class="singe-line">Refund Policy</h2>
            <div class="popup-content-text">
              <p>
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
              </p>
            </div>
          </div>

        <div id="contact" class="popup popup-50 text-s">
          <div class="btn-close">close</div>
          <h2 class="singe-line">Contact</h2>
          <div class="popup-content-text">
            <p>
              We take care to ensure completeness, corectness and being
              up-to-date, we can not guarantee this. Each Hackathon
              participant is responsible for his or her submitted ideas. This
              includes also any copyright violations affecting third parties
              resulting from these ideas.
            </p>
            <br />
            <p>
                Tva Studio<br />
                Diepenbrockstraße 11-13<br />
                48145 Münster Germany<br />
                T: +41 61 377 00 00<br />
                F: +41 61 377 15 20
            </p>
          </div>
        </div>
        <div id="datenschutz" class="popup popup-50">
            <div class="btn-close">close</div>
            <h2 class="singe-line">Datenschutz</h2>
            <div class="popup-content-text">
              <p>
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
              </p>
            </div>
          </div>
          <div id="agb" class="popup popup-50">
            <div class="btn-close">close</div>
            <h2 class="singe-line">AGB</h2>
            <div class="popup-content-text">
              <p>
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
                PLEASE NOTE (COVID-19 ANNOUNCEMENT): As part of our COVID-19
                response, we are not allowing exchanges or returns at this time.
                Orders purchased during this time may be delayed due to business
                interruptions due to local regulations regarding Covid-19. We
                appreciate your patience and understanding at this time.
                SHIPPING: Please allow up to 3-10 business days for your order
                to be shipped. You will get a shipping confirmation via email
                with tracking information as soon as it’s available.
                INTERNATIONAL SHIPPING / CUSTOMS We ship worldwide! However, we
                do reserve the right to cancel and refund any order that is
                deemed potentially fraudulent by our payment system.
                International shipping prices vary by country and the weight of
                your order. Peace & Quiet does not take any responsibility for
                any customs charges, fees, etc. Customs charges are different
                for every country. We do our best to mark your order as a gift
                but sometimes we have no control over customs charging taxes and
                fees. All sales are final, however if you receive the wrong
                item/size from what was ordered, please notify us in a timely
                manner. We are not responsible for lost or stolen packages. For
                any inquires regarding an order, please contact our customer
                service via email.
              </p>
            </div>
          </div>
      </div>

      <div class="col-right">
        <div class="box main-about">
            <div class="about-heading">
                <h1 class="singe-line">Hi, we are TVA</h1>
              </div>
            <img class="border-t border-b" src="/themes/tva/assets/images/tva-team.png">

        </div>
      </div>
</div>



@endsection