<?php

namespace App\Providers;

use App\Repositories\Core\Eloquent\ApplicationSettingRepository;
use App\Repositories\Core\Eloquent\LanguageRepository;
use App\Repositories\Core\Eloquent\NavigationRepository;
use App\Repositories\Core\Eloquent\RoleRepository;
use App\Repositories\Core\Eloquent\SystemNoticeRepository;
use App\Repositories\Core\Interfaces\ApplicationSettingInterface;
use App\Repositories\Core\Interfaces\LanguageInterface;
use App\Repositories\Core\Interfaces\NavigationInterface;
use App\Repositories\Core\Interfaces\RoleInterface;
use App\Repositories\Core\Interfaces\SystemNoticeInterface;
use App\Repositories\User\Eloquent\NotificationRepository;
use App\Repositories\User\Eloquent\ProfileRepository;
use App\Repositories\User\Eloquent\UserRepository;
use App\Repositories\User\Interfaces\NotificationInterface;
use App\Repositories\User\Interfaces\ProfileInterface;
use App\Repositories\User\Interfaces\UserInterface;
use App\Repositories\Area\Eloquent\AreaRepository;
use App\Repositories\Area\Interfaces\AreaInterface;
use App\Repositories\Hotel\Eloquent\HotelRepository;
use App\Repositories\Hotel\Interfaces\HotelInterface;
use App\Repositories\HotelImage\Eloquent\HotelImageRepository;
use App\Repositories\HotelImage\Interfaces\HotelImageInterface;
use App\Repositories\Room\Eloquent\RoomRepository;
use App\Repositories\Room\Interfaces\RoomInterface;
use App\Repositories\RoomImage\Eloquent\RoomImageRepository;
use App\Repositories\RoomImage\Interfaces\RoomImageInterface;

use App\Repositories\BusImage\Eloquent\BusImageRepository;
use App\Repositories\BusImage\Interfaces\BusImageInterface;
use App\Repositories\BusInfo\Eloquent\BusInfoRepository;
use App\Repositories\BusInfo\Interfaces\BusInfoInterface;
use App\Repositories\BusTicketReservation\Eloquent\BusTicketReservationRepository;
use App\Repositories\BusTicketReservation\Interfaces\BusTicketReservationInterface;
use App\Repositories\HotelReservation\Eloquent\HotelReservationRepository;
use App\Repositories\HotelReservation\Interfaces\HotelReservationInterface;
use App\Repositories\RentCarImage\Eloquent\RentCarImageRepository;
use App\Repositories\RentCarImage\Interfaces\RentCarImageInterface;
use App\Repositories\RentCarInfo\Eloquent\RentCarInfoRepository;
use App\Repositories\RentCarInfo\Interfaces\RentCarInfoInterface;
use App\Repositories\RentCarReservation\Eloquent\RentCarReservationRepository;
use App\Repositories\RentCarReservation\Interfaces\RentCarReservationInterface;
use App\Repositories\TourPackageImage\Eloquent\TourPackageImageRepository;
use App\Repositories\TourPackageImage\Interfaces\TourPackageImageInterface;
use App\Repositories\TourPackageInfo\Eloquent\TourPackageInfoRepository;
use App\Repositories\TourPackageInfo\Interfaces\TourPackageInfoInterface;
use App\Repositories\TourPackageReservation\Eloquent\TourPackageReservationRepository;
use App\Repositories\TourPackageReservation\Interfaces\TourPackageReservationInterface;
use App\Repositories\VenueImage\Eloquent\VenueImageRepository;
use App\Repositories\VenueImage\Interfaces\VenueImageInterface;
use App\Repositories\VenueInfo\Eloquent\VenueInfoRepository;
use App\Repositories\VenueInfo\Interfaces\VenueInfoInterface;
use App\Repositories\VenueReservation\Eloquent\VenueReservationRepository;
use App\Repositories\VenueReservation\Interfaces\VenueReservationInterface;
use App\Repositories\VisaInfo\Eloquent\VisaInfoRepository;
use App\Repositories\VisaInfo\Interfaces\VisaInfoInterface;
use App\Repositories\Slider\Eloquent\SliderRepository;
use App\Repositories\Slider\Interfaces\SliderInterface;
use App\Repositories\HotelKeywords\Eloquent\HotelKeywordsRepository;
use App\Repositories\HotelKeywords\Interfaces\HotelKeywordsInterface;
use App\Repositories\RoomKeywords\Eloquent\RoomKeywordsRepository;
use App\Repositories\RoomKeywords\Interfaces\RoomKeywordsInterface;
use App\Repositories\PhoneOtp\Eloquent\PhoneOtpRepository;
use App\Repositories\PhoneOtp\Interfaces\PhoneOtpInterface;
use App\Repositories\VisaReservation\Eloquent\VisaReservationRepository;
use App\Repositories\VisaReservation\Interfaces\VisaReservationInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ApplicationSettingInterface::class, ApplicationSettingRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(NavigationInterface::class, NavigationRepository::class);
        $this->app->bind(SystemNoticeInterface::class, SystemNoticeRepository::class);
        $this->app->bind(NotificationInterface::class, NotificationRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(ProfileInterface::class, ProfileRepository::class);
        $this->app->bind(LanguageInterface::class, LanguageRepository::class);
        $this->app->bind(AreaInterface::class, AreaRepository::class);
        $this->app->bind(HotelInterface::class, HotelRepository::class);
        $this->app->bind(HotelImageInterface::class, HotelImageRepository::class);
        $this->app->bind(RoomInterface::class, RoomRepository::class);
        $this->app->bind(RoomImageInterface::class, RoomImageRepository::class);
        $this->app->bind(BusImageInterface::class, BusImageRepository::class);
        $this->app->bind(BusInfoInterface::class, BusInfoRepository::class);
        $this->app->bind(BusTicketReservationInterface::class, BusTicketReservationRepository::class);
        $this->app->bind(HotelReservationInterface::class, HotelReservationRepository::class);
        $this->app->bind(RentCarImageInterface::class, RentCarImageRepository::class);
        $this->app->bind(RentCarInfoInterface::class, RentCarInfoRepository::class);
        $this->app->bind(RentCarReservationInterface::class, RentCarReservationRepository::class);
        $this->app->bind(TourPackageImageInterface::class, TourPackageImageRepository::class);
        $this->app->bind(TourPackageInfoInterface::class, TourPackageInfoRepository::class);
        $this->app->bind(TourPackageReservationInterface::class, TourPackageReservationRepository::class);
        $this->app->bind(VenueImageInterface::class, VenueImageRepository::class);
        $this->app->bind(VenueInfoInterface::class, VenueInfoRepository::class);
        $this->app->bind(VenueReservationInterface::class, VenueReservationRepository::class);
        $this->app->bind(VisaInfoInterface::class, VisaInfoRepository::class);
        $this->app->bind(SliderInterface::class, SliderRepository::class);
        $this->app->bind(HotelKeywordsInterface::class, HotelKeywordsRepository::class);
        $this->app->bind(RoomKeywordsInterface::class, RoomKeywordsRepository::class);
        $this->app->bind(PhoneOtpInterface::class, PhoneOtpRepository::class);
        $this->app->bind(VisaReservationInterface::class, VisaReservationRepository::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
