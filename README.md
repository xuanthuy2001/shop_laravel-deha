<h1>Sản phẩm vẫn đang hoàn thiện  </h1>
Setup:
    copy .env.example .env

    composer install
    php artisan key:generate
    php artisa migrate --seed
    php artisan db:seed --class=RoleDatabaseSeeder
    php artisan cache:clear
    php artisan storage:link
    
    => sau đó bạn đăng nhập với tài khoản superAdmin: admin@gmail.com , mật khẩu: 123456a@
    

Định hướng tiếp theo: 

    Tạo lại trang đăng nhập 
    Đăng nhập sử dụng các mạng xã hội:google, github, facebook
    Chức năng gửi mail: tạo đơn hàng, gửi mail khi lấy laị mật khẩu 
    Chức năng export excel 
    
chức năng chính: giỏ hàng, đặt hàng, đăng ký đăng nhập 
