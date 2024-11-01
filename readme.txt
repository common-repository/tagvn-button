=== Plugin Name ===

Tagvn Button
Version: 2.0.2
Plugin URI: http://www.tagvn.com/buttons#wordpress
Contributors: Tagvn.com
Stable tag: 2.0.2
Tags: social news, button, tagvn
Requires at least: 2.0.2
Tested up to: 3.0.1

== Description ==

Nút gửi bài cho phép bạn chèn nút chia sẻ của Tagvn vào Blog. Từ đó sẽ tạo điều kiện cho bạn hoặc các user khác chia sẻ thông tin từ website của mình vào Tagvn.com cũng như là khả năng bình chọn thông tin. Xem thêm tại đây http://www.tagvn.com/buttons#wordpress.

== Installation ==

CHỈ SỬ DỤNG 1 CÁCH DUY NHẤT

Cách 1: Dễ dàng nhất (Chúng tôi khuyến cáo các bạn nên sử dụng cách này)
	1. Copy Folder 'tagvn_button' vào '/wp-content/plugins/'.
	2. Activate Plugin Tagvn Button trong 'Plugins' ở WordPress.
	3. Thế là xong! Nút Tagvn sẽ được đính kèm theo bài viết 1 cách tự động!
	4. Bạn có thể chỉnh giao diện bằng cách vào "Settings" ---> "Tinh chỉnh nút Tag".

Cách 2: Chèn nút Tagvn bằng tay vào từng bài viết
	1. Copy Folder 'tagvn_button' vào '/wp-content/plugins/'.
	2. Activate Plugin Tagvn Button trong 'Plugins' ở WordPress.
	3. Gõ '<!--Tagit-->' tại vị trí mà bạn muốn nút hiển thị. Dùng bộ soạn thảo code editor, không phải visual.
	4. Trong "Settings" ---> "Tinh chỉnh nút Tag" ---> lựa chọn "Tự chèn Code" và lưu lại.

Cách 3: Chèn nút Tagvn tự động vào các vị trí đặc biệt trong vòng "loop".
	1. Copy Folder 'tagvn_button' vào '/wp-content/plugins/'.
	2. Activate Plugin Tagvn Button trong 'Plugins' ở WordPress.
	3. Copy '<?php show_tagit ();?>' tại bất kỳ điểm nào bạn muốn nút này hiện trong vòng Wordpress "loop".
	4. Trong "Settings" ---> "Tinh chỉnh nút Tag" ---> lựa chọn "Tự chèn Code" và lưu lại.

== Upgrade Notice ==

1. Vào 'Settings' ---> Chọn Plugin Tagvn ---> Deactivate.
2. Xóa toàn bộ thư mục Plugin Tagvn cũ đi.
3. Bắt đầu cài đặt mới theo các trình tự bên trên.

== Screenshots ==

1. Cài đặt.
2. Hiển thị trong Blog.
3. Tinh chỉnh nút trong Admin

== Changelog ==

= 1.0.1 =

- Sửa lỗi trình soạn thảo trong Version 2.5.1.

= 2.0.0 =

- Chèn nút chia sẻ mới của Tagvn.
- Cho phép người dùng chọn lựa template cho nút chia sẻ.
- Hỗ trợ tiếng Việt tốt hơn.

= 2.0.1 =

- Nén các file Javascript để tăng tốc độ tải

= 2.0.2 =

- Nâng cấp version mới của nút chia sẻ. Cho phép người dùng bình chọn trực tiếp trên Website của bạn mà không cần phải vào Tagvn.com.

== Frequently Asked Questions ==

Các bạn có thể vào đây http://www.tagvn.com/cr/list.php?3 để được hỗ trợ sử dụng & thông báo Bug 