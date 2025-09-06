# Kerala PSC Project - Complete Portal System

This project includes a complete login and registration system for the Kerala PSC portal with a modern, user-friendly design.

## ✨ **New Features**

### 🔐 **Modern Login System**
- User authentication with email/username and password
- Secure password hashing using PHP's password_hash()
- Session management
- Responsive design with dark mode toggle
- Dashboard for authenticated users
- Database-driven user management

### 🚀 **Modern Registration System**
- **Step-by-Step Process**: 4 clear, manageable steps
- **Visual Progress Bar**: Shows completion status
- **Responsive Design**: Works perfectly on all devices
- **Smart Validation**: Real-time feedback and error handling
- **Document Upload**: Photo and signature with specifications
- **User-Friendly**: Less overwhelming than traditional forms

## 📋 **Registration Flow**

1. **Personal Information** - Basic details and family information
2. **Contact Details** - Email and mobile with confirmation
3. **Identity & Documents** - ID proof and file uploads
4. **Account Setup** - Username, password, and terms

## 🛠️ **Setup Instructions**

### 1. **Database Setup**

1. Start your XAMPP server (Apache and MySQL)
2. Open phpMyAdmin (http://localhost/phpmyadmin)
3. Import the `database_setup.sql` file or run the SQL commands manually
4. The database `kerala_psc` will be created with a sample user

### 2. **Sample Login Credentials**

- **Username/Email**: admin
- **Password**: password123

### 3. **File Structure**

```
├── kerala_psc_index.php      # Main homepage
├── login_page.php            # Login form
├── process_login.php         # Login processing
├── register.php              # Modern registration form
├── process_registration.php  # Registration processing
├── registration_success.php  # Success page
├── dashboard.php             # User dashboard
├── logout.php                # Logout functionality
├── includes/
│   ├── db.php               # Database connection
│   ├── header.php           # Common header
│   └── footer.php           # Common footer
├── uploads/                  # Document uploads directory
├── database_setup.sql       # Database setup script
├── registration_flow.md     # Registration flow documentation
└── README.md                # This file
```

## 🔄 **How It Works**

### **Login Flow**
1. **Homepage** (`kerala_psc_index.php`): Displays the main portal with navigation
2. **Login** (`login_page.php`): User enters credentials
3. **Authentication** (`process_login.php`): Validates credentials and creates session
4. **Dashboard** (`dashboard.php`): Protected area for authenticated users
5. **Logout** (`logout.php`): Destroys session and redirects to home

### **Registration Flow**
1. **Registration Form** (`register.php`): Step-by-step form with progress bar
2. **Processing** (`process_registration.php`): Validates data and uploads files
3. **Success Page** (`registration_success.php`): Confirmation and next steps
4. **Ready to Login**: User can now access the portal

## 🎯 **Key Benefits**

### **For New Users**
- **Less Overwhelming**: Breaking large form into small steps
- **Clear Progress**: Users know exactly where they are
- **Easy Navigation**: Can go back to fix mistakes
- **Visual Guidance**: Progress bar and step indicators
- **Mobile Friendly**: Works perfectly on smartphones
- **Helpful Hints**: Clear instructions for each section

### **For Administrators**
- **Comprehensive Data**: All required information collected
- **File Management**: Secure document upload system
- **Data Validation**: Server-side and client-side validation
- **User Tracking**: Complete user registration history

## 🛡️ **Security Features**

- Password hashing using bcrypt
- Prepared statements to prevent SQL injection
- Session-based authentication
- Input validation and sanitization
- Secure file upload handling
- Secure redirects

## 📱 **Design Features**

- **Modern UI/UX**: Clean, professional design
- **Responsive Layout**: Works on all screen sizes
- **Progress Tracking**: Visual step indicators
- **Error Handling**: User-friendly error messages
- **Accessibility**: Easy to use for all users

## 🔧 **Customization**

- Update database credentials in `includes/db.php`
- Modify the design by editing CSS in the respective files
- Add more user fields in the database and forms
- Extend dashboard functionality as needed
- Customize validation rules and error messages

## 📋 **Requirements**

- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx web server
- XAMPP (recommended for development)
- File upload permissions enabled

## 📚 **Documentation**

- **Registration Flow**: See `registration_flow.md` for detailed flow diagram
- **Database Schema**: Check `database_setup.sql` for table structure
- **Code Comments**: Well-documented PHP and JavaScript code

## 🚀 **Getting Started**

1. **Clone/Download** the project files
2. **Set up XAMPP** and start Apache + MySQL
3. **Import database** using `database_setup.sql`
4. **Configure** database connection in `includes/db.php`
5. **Access** the portal at `http://localhost/KERALA%20PSC%20PROJECT/`

## 📞 **Support**

For technical support or questions:
- Check the documentation files
- Review the code comments
- Ensure all requirements are met
- Verify file permissions for uploads

---

**Note**: This modern registration system transforms the complex, congested original form into a user-friendly, step-by-step experience that guides new users through the registration process with confidence and clarity. 