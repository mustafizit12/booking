<?php $__env->startSection('content'); ?>
<!--main-->
<div class="main" role="main">
  <div class="wrap clearfix">
    <!--main content-->
    <div class="content clearfix">
      <!--three-fourth content-->
      <section class="three-fourth">

        <h1>My Bookings</h1>

        <!--inner navigation-->
        <nav class="inner-nav">
          <ul>
            <li><a href="#HotelBookings" title="Hotel Bookings">Hotel Bookings</a></li>
            <li><a href="#PackageTourBookings" title="Package Tour Bookings">Package Tour Bookings</a></li>
            <li><a href="#VenueBookings" title="Venue Bookings">Venue Bookings</a></li>
            <li><a href="#RentACarBookings" title="Rent A Car Bookings">Rent A Car Bookings</a></li>
            <li><a href="#BusTicketBookings" title="Bus Ticket Bookings">Bus Ticket Bookings</a></li>
            <li><a href="#VisaBookings" title="Visa Bookings">Visa Bookings</a></li>
            <!-- <li><a href="#MyReviews" title="My Reviews">My Reviews</a></li>
            <li><a href="#MySettings" title="Settings">Settings</a></li> -->
          </ul>
        </nav>
        <!--//inner navigation-->

        <!--My Bookings-->
        <section id="HotelBookings" class="tab-content">
          <?php if(sizeof($rooms)>0): ?>
          <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
          $room_details = App\Models\Admin\Room::where('id',$value->room_id)->first();
          ?>
          <!--booking-->
          <article class="bookings">
            <h1><a href="<?php echo e(url('hotel_details/'.$value->hotel->id)); ?>"><?php echo e($value->hotel->name); ?></a></h1>
            <div class="b-info">
              <table>
                <tr>
                  <th>Booking number</th>
                  <td><?php echo e($value->id); ?></td>
                </tr>
                <tr>
                  <th>Room</th>
                  <td><?php echo e($room_details->room_name); ?></td>
                </tr>
                <tr>
                  <th>Check-in Date</th>
                  <td><?php echo e(date('D d M Y',strtotime($value->from_date))); ?></td>
                </tr>
                <tr>
                  <th>Check-out Date</th>
                  <td><?php echo e(date('D d M Y',strtotime($value->to_date))); ?></td>
                </tr>
                <tr>
                  <th>Total Price:</th>
                  <td><strong><?php echo e($value->total_rent); ?></strong></td>
                </tr>
              </table>
            </div>

            <!-- <div class="actions">
              <a href="#" class="gradient-button">Change booking</a>
              <a href="#" class="gradient-button">Cancel booking</a>
              <a href="#" class="gradient-button">View confirmation</a>
              <a href="#" class="gradient-button">Print confirmation</a>
            </div> -->
          </article>
          <!--//booking-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </section>
        <!--//My Bookings-->
        <section id="PackageTourBookings" class="tab-content">
          <?php if(sizeof($tour_package)>0): ?>
          <?php $__currentLoopData = $tour_package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--booking-->
          <article class="bookings">
            <h1><a href="<?php echo e(url('package_tour_details/'.$value->package->id)); ?>"><?php echo e($value->package->package_name); ?></a></h1>
            <div class="b-info">
              <table>
                <tr>
                  <th>Booking number</th>
                  <td><?php echo e($value->id); ?></td>
                </tr>
                <tr>
                  <th>Package Valid Till</th>
                  <td><?php echo e(date('D d M Y',strtotime($value->package->valid_till))); ?></td>
                </tr>
                <tr>
                  <th>Total Quantity</th>
                  <td><?php echo e($value->order_quantity); ?></td>
                </tr>
                <tr>
                  <th>Package Cost</th>
                  <td><?php echo e($value->total_cost); ?></td>
                </tr>
              </table>
            </div>

            <!-- <div class="actions">
              <a href="#" class="gradient-button">Change booking</a>
              <a href="#" class="gradient-button">Cancel booking</a>
              <a href="#" class="gradient-button">View confirmation</a>
              <a href="#" class="gradient-button">Print confirmation</a>
            </div> -->
          </article>
          <!--//booking-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </section>
        <section id="VenueBookings" class="tab-content">
          <?php if(sizeof($venue)>0): ?>
          <?php $__currentLoopData = $venue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--booking-->
          <article class="bookings">
            <h1><a href="<?php echo e(url('venue_details/'.$value->venue->id)); ?>"><?php echo e($value->venue->venue_name); ?></a></h1>
            <div class="b-info">
              <table>
                <tr>
                  <th>Booking number</th>
                  <td><?php echo e($value->id); ?></td>
                </tr>
                <tr>
                  <th>Area</th>
                  <td><?php echo e($value->venue->area->name); ?></td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td><?php echo e($value->venue->address); ?></td>
                </tr>
                <tr>
                  <th>Contact Info</th>
                  <td><?php echo e($value->venue->contact_info); ?></td>
                </tr>
                <tr>
                  <th>From Date</th>
                  <td><?php echo e(date('D d M Y',strtotime($value->from_date))); ?></td>
                </tr>
                <tr>
                  <th>To Date</th>
                  <td><?php echo e(date('D d M Y',strtotime($value->to_date))); ?></td>
                </tr>
                <tr>
                  <th>Venue Rent:</th>
                  <td><strong><?php echo e($value->total_rent); ?></strong></td>
                </tr>
              </table>
            </div>

            <!-- <div class="actions">
              <a href="#" class="gradient-button">Change booking</a>
              <a href="#" class="gradient-button">Cancel booking</a>
              <a href="#" class="gradient-button">View confirmation</a>
              <a href="#" class="gradient-button">Print confirmation</a>
            </div> -->
          </article>
          <!--//booking-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </section>
        <section id="RentACarBookings" class="tab-content">
          <?php if(sizeof($rent_a_car)>0): ?>
          <?php $__currentLoopData = $rent_a_car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--booking-->
          <article class="bookings">
            <h1><a href="<?php echo e(url('rent_a_car_details/'.$value->rentCar->id)); ?>"><?php echo e($value->rentCar->car_model); ?></a></h1>
            <div class="b-info">
              <table>
                <tr>
                  <th>Booking number</th>
                  <td><?php echo e($value->id); ?></td>
                </tr>
                <tr>
                  <th>Owner Name</th>
                  <td><?php echo e($value->rentCar->owner_name); ?></td>
                </tr>
                <tr>
                  <th>Owner Contact</th>
                  <td><?php echo e($value->rentCar->owner_contact); ?></td>
                </tr>
                <tr>
                  <th>Owner Address</th>
                  <td><?php echo e($value->rentCar->owner_address); ?></td>
                </tr>

              </table>
            </div>

            <!-- <div class="actions">
              <a href="#" class="gradient-button">Change booking</a>
              <a href="#" class="gradient-button">Cancel booking</a>
              <a href="#" class="gradient-button">View confirmation</a>
              <a href="#" class="gradient-button">Print confirmation</a>
            </div> -->
          </article>
          <!--//booking-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </section>
        <section id="BusTicketBookings" class="tab-content">
          <?php if(sizeof($bus_ticket)>0): ?>
          <?php $__currentLoopData = $bus_ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--booking-->
          <article class="bookings">
            <h1><a href="<?php echo e(url('bus_details/'.$value->bus->id)); ?>"><?php echo e($value->bus->bus_model); ?></a></h1>
            <div class="b-info">
              <table>
                <tr>
                  <th>Booking number</th>
                  <td><?php echo e($value->id); ?></td>
                </tr>
                <tr>
                  <th>Company Name</th>
                  <td><?php echo e($value->bus->company_name); ?></td>
                </tr>
                <tr>
                  <th>Bus Quality</th>
                  <td><?php if($value->bus->bus_quality == 1): ?> Ac <?php else: ?> Non-Ac <?php endif; ?></td>
                </tr>
                <tr>
                  <th>Starting Point</th>
                  <td><?php echo e($value->bus->starting_point); ?></td>
                </tr>
                <tr>
                  <th>End Point</th>
                  <td><?php echo e($value->bus->end_point); ?></td>
                </tr>
                <tr>
                  <th>Departure Time</th>
                  <td><?php echo e($value->bus->departure_time); ?></td>
                </tr>
                <tr>
                  <th>Arrival Time</th>
                  <td><?php echo e($value->bus->arrival_time); ?></td>
                </tr>
                <tr>
                  <th>Ticket Quantity</th>
                  <td><?php echo e($value->seat_quantity); ?></td>
                </tr>
                <tr>
                  <th>Total Price:</th>
                  <td><strong><?php echo e($value->total_rent); ?></strong></td>
                </tr>
              </table>
            </div>

            <!-- <div class="actions">
              <a href="#" class="gradient-button">Change booking</a>
              <a href="#" class="gradient-button">Cancel booking</a>
              <a href="#" class="gradient-button">View confirmation</a>
              <a href="#" class="gradient-button">Print confirmation</a>
            </div> -->
          </article>
          <!--//booking-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </section>
        <section id="VisaBookings" class="tab-content">
          <?php if(sizeof($visa)>0): ?>
          <?php $__currentLoopData = $visa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--booking-->
          <article class="bookings">
            <h1><a href="<?php echo e(url('visa_details/'.$value->visa->id)); ?>"><?php echo e($value->visa->title); ?></a></h1>
            <div class="b-info">
              <table>
                <tr>
                  <th>Booking number</th>
                  <td><?php echo e($value->id); ?></td>
                </tr>
                <tr>
                  <th>Company Name</th>
                  <td><?php echo e($value->visa->visa_country); ?></td>
                </tr>
                <tr>
                  <th>Visa Duration</th>
                  <td><?php echo e($value->visa->visa_duration); ?></td>
                </tr>
                <tr>
                  <th>Total Cost:</th>
                  <td><strong><?php echo e($value->total_amount); ?></strong></td>
                </tr>
              </table>
            </div>

            <!-- <div class="actions">
              <a href="#" class="gradient-button">Change booking</a>
              <a href="#" class="gradient-button">Cancel booking</a>
              <a href="#" class="gradient-button">View confirmation</a>
              <a href="#" class="gradient-button">Print confirmation</a>
            </div> -->
          </article>
          <!--//booking-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </section>
      </section>
      <!--//three-fourth content-->

      <!--sidebar-->
      <aside class="right-sidebar">

        <!--Need Help Booking?-->
        <article class="default clearfix">
          <h2>Need Help Booking?</h2>
          <p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
          <p class="number">1- 555 - 555 - 555</p>
        </article>
        <!--//Need Help Booking?-->

        <!--Why Book with us?-->
        <article class="default clearfix">
          <h2>Why Book with us?</h2>
          <h3>Low rates</h3>
          <p>Get the best rates, or get a refund.<br />No booking fees. Save money!</p>
          <h3>Largest Selection</h3>
          <p>140,000+ hotels worldwide<br />130+ airlines<br />Over 3 million guest reviews</p>
          <h3>We’re Always Here</h3>
          <p>Call or email us, anytime<br />Get 24-hour support before, during, and after your trip</p>
        </article>
        <!--//Why Book with us?-->

      </aside>
      <!--//sidebar-->
    </div>
    <!--//main content-->
  </div>
</div>
<!--//main-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/fontend/bookings.blade.php ENDPATH**/ ?>