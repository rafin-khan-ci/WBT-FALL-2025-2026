# 🏨 N3XTSTAY - Hotel Booking System

A modern, full-featured hotel booking system built with HTML, CSS, PHP, MySQL, and JavaScript. Features a beautiful gradient UI, secure authentication, payment processing, and comprehensive booking management.

## ✨ Features

### User Features
- **User Authentication**: Secure registration and login with session management
- **Hotel Search**: Search hotels by destination, dates, and number of guests
- **Hotel Details**: View detailed information, amenities, room types, and reviews
- **Room Booking**: Select rooms and proceed with booking
- **Payment Processing**: Integrated payment flow with bKash, Nagad, and Credit Card options
- **Booking Management**: View, track, and cancel bookings (within 24 hours)
- **Booking Status Tracking**: Real-time status updates (Pending → Confirmed → Cancelled)

### Admin Features
- **Dashboard**: Overview of bookings, revenue, and system statistics
- **Hotel Management**: Add, edit, and manage hotels
- **Room Management**: Add, edit, and manage room types
- **Booking Management**: View and manage all bookings
- **User Management**: View and manage registered users

### Technical Features
- **Responsive Design**: Mobile-first design with modern gradient UI
- **Custom Modal System**: Replacement for browser dialogs for better UX
- **Robust Error Handling**: Graceful error handling with user-friendly messages
- **Security**: Password hashing, session management, SQL injection prevention
- **Database Transactions**: Ensures data integrity during booking/payment

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Server**: Apache (XAMPP recommended)
- **Design**: Custom CSS with modern gradients and animations

## 📋 Prerequisites

- XAMPP (or similar Apache + MySQL + PHP stack)
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Modern web browser (Chrome, Firefox, Safari, Edge)

## 🚀 Installation

### 1. Clone/Download the Project
```bash
# Place the project in your XAMPP htdocs directory
cd C:\xampp\htdocs\WBT
```

### 2. Database Setup
1. Start XAMPP (Apache and MySQL)
2. Open phpMyAdmin: `http://localhost/phpmyadmin`
3. Create a new database named `hotel_booking`
4. Import the database schema:
   - Navigate to the `database` folder
   - Import `hotel_booking.sql` (schema + structure)
   - Import `sample_data.sql` (sample hotels and rooms)

### 3. Configuration
1. Open `config/config.php`
2. Verify database credentials:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'hotel_booking');
```
3. Update `SITE_URL` if needed:
```php
define('SITE_URL', 'http://localhost/WBT/hotel_booking');
```

### 4. File Permissions
Ensure the following directories are writable:
- `assets/images/`
- `uploads/` (if exists)

## 🎯 Usage

### Access the Application
- **Frontend**: `http://localhost/WBT/hotel_booking/`
- **Admin Panel**: `http://localhost/WBT/hotel_booking/admin/`

### Default Admin Credentials
```
Email: admin@nextstay.com
Password: admin123
```

### User Registration
1. Click "Sign Up" on the homepage
2. Fill in registration details
3. Login with your credentials

### Making a Booking

#### Standard User Flow:
1. **Search**: Enter destination, dates, and number of guests
2. **Browse**: View available hotels and rooms
3. **Select**: Choose a hotel and room type
4. **Book**: Click "Book Now" and confirm details
5. **Payment**: Select payment method (bKash/Nagad/Card)
6. **Confirm**: Enter payment details and confirm
7. **Success**: Booking status changes to "Confirmed"

#### Booking Status Flow:
- **Pending**: Initial status after booking creation
- **Confirmed**: After successful payment completion
- **Cancelled**: If user cancels within 24 hours

### Cancelling a Booking
1. Go to "My Bookings"
2. Find the booking to cancel (must be within 24 hours of creation)
3. Click "Cancel" button
4. Confirm cancellation in the modal
5. Status updates to "Cancelled"

## 📁 Project Structure

```
hotel_booking/
├── admin/                  # Admin panel
│   ├── actions/           # Admin action handlers
│   ├── includes/          # Admin header, sidebar
│   ├── dashboard.php      # Admin dashboard
│   ├── manage-hotels.php  # Hotel management
│   ├── manage-rooms.php   # Room management
│   └── manage-bookings.php
├── api/                   # Backend API endpoints
│   ├── create_booking.php
│   ├── process-payment.php
│   └── cancel-booking.php
├── assets/                # Frontend assets
│   ├── css/
│   │   ├── style.css     # Main stylesheet
│   │   └── admin.css     # Admin styles
│   ├── js/
│   │   ├── main.js       # Main JavaScript
│   │   └── admin.js      # Admin JavaScript
│   └── images/           # Images and logos
├── auth/                  # Authentication
│   ├── login.php
│   └── register.php
├── config/               # Configuration
│   └── config.php        # Main config file
├── database/             # Database files
│   ├── hotel_booking.sql # Schema
│   └── sample_data.sql   # Sample data
├── includes/             # Shared includes
│   ├── Database.php      # Database class
│   ├── Session.php       # Session management
│   ├── functions.php     # Helper functions
│   ├── header.php        # Site header
│   ├── footer.php        # Site footer
│   └── auth-modal.php    # Auth modal
├── index.php             # Homepage
├── hotels.php            # Hotel listing
├── hotel-details.php     # Hotel details
├── booking.php           # Booking page
├── payment.php           # Payment page
├── my-bookings.php       # User bookings
└── README.md             # This file
```

## 🎨 Design Features

- **Modern Gradient UI**: Beautiful purple/blue gradient color scheme
- **Responsive Layout**: Mobile-first design with breakpoints
- **Interactive Elements**: Hover effects, smooth transitions
- **Custom Modals**: Better UX than browser dialogs
- **Professional Icons**: Emoji-based icons for better visual appeal
- **Payment Method Logos**: Visual payment selection with custom logos

## 🔒 Security Features

- **Password Hashing**: bcrypt for secure password storage
- **SQL Injection Prevention**: Prepared statements throughout
- **Session Security**: Secure session configuration
- **CSRF Protection**: Form token validation
- **Input Validation**: Both client and server-side validation
- **Authentication Guards**: Protected routes and API endpoints

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**
- Verify MySQL is running in XAMPP
- Check credentials in `config/config.php`
- Ensure database `hotel_booking` exists

**Buttons Not Working**
- Clear browser cache: `Ctrl + Shift + R` (Windows) or `Cmd + Shift + R` (Mac)
- Check browser console for JavaScript errors
- Try in Incognito/Private mode

**Images Not Loading**
- Check file paths in database
- Ensure `assets/images/` has proper permissions
- Verify `SITE_URL` in `config/config.php`

**Payment Not Confirming**
- Check `api/process-payment.php` exists
- Verify database `payments` table structure
- Check browser console for errors

**Duplicate Bookings Display**
- This was fixed with `GROUP BY` in SQL query
- Ensure you have the latest version of `my-bookings.php`

## 📝 Known Limitations

- Payment integration is a simulation (not connected to real payment gateways)
- Email notifications not implemented
- Room availability not dynamically calculated based on existing bookings
- No calendar view for booking dates
- Admin role management is basic (single admin level)

## 🔄 Future Enhancements

- Real payment gateway integration (Stripe, PayPal)
- Email notifications for bookings and confirmations
- Advanced search filters (price range, rating, amenities)
- Calendar view for date selection
- Multiple admin roles and permissions
- Booking modification (date changes)
- Review and rating system for completed bookings
- Promotional codes and discounts
- Multi-language support
- Dark mode toggle

## 🤝 Contributing

This is a university project. For educational purposes only.

## 📄 License

This project is developed as part of a Web-Based Technology (WBT) course.

## 👨‍💻 Developer

Built with ❤️ for WBT Course

---

**Last Updated**: January 2026
**Version**: 1.0.0
