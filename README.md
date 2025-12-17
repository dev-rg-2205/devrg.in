# devrg.in
My Own Website


website/
│
├── admin/                     # Admin Panel
│   ├── index.php               # Admin Dashboard
│   ├── login.php
│   ├── logout.php
│   ├── auth.php                # Auth middleware
│   │
│   ├── blog/
│   │   ├── list.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── delete.php
│   │
│   ├── education/
│   │   ├── list.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── delete.php
│   │
│   ├── experience/
│   │   ├── list.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── delete.php
│   │
│   ├── includes/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── sidebar.php
│   │
│   └── assets/
│       ├── css/
│       ├── js/
│       └── img/
│
├── app/                       # Core Business Logic
│   ├── config/
│   │   ├── database.php
│   │   ├── app.php
│   │   └── constants.php
│   │
│   ├── controllers/
│   │   ├── BlogController.php
│   │   ├── EducationController.php
│   │   └── ExperienceController.php
│   │
│   ├── models/
│   │   ├── Blog.php
│   │   ├── Education.php
│   │   └── Experience.php
│   │
│   └── helpers/
│       ├── auth.php
│       ├── seo.php
│       └── utils.php
│
├── public/                    # Public Website (ONLY THIS IS PUBLIC)
│   ├── index.php               # Home Page
│   ├── blog.php
│   ├── blog-details.php
│   ├── education.php
│   ├── experience.php
│   ├── contact.php
│   │
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── img/
│   │
│   └── uploads/                # Blog images
│
├── includes/                  # Shared UI
│   ├── header.php
│   ├── footer.php
│   └── navbar.php
│
├── storage/                   # Non-public
│   ├── logs/
│   └── cache/
│
├── vendor/                    # Composer (future use)
│
├── .env                       # DB credentials
├── .htaccess
└── README.md
