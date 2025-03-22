<?php
// تحديد مسار الملف النصي لتخزين البيانات
$file = "book.txt";

// التحقق من أن النموذج تم إرساله
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // جمع البيانات المدخلة من النموذج
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    // التحقق من أن الحقول ليست فارغة
    if (empty($title) || empty($author) || empty($price)) {
        echo "الرجاء ملء جميع الحقول.";
    } else {
        // تنسيق البيانات التي سيتم حفظها
        $data = "عنوان الكتاب: " . $title . "\n";
        $data .= "اسم المؤلف: " . $author . "\n";
        $data .= "السعر: " . $price . " الف دينار\n";
        $data .= "-------------------------\n";

        // كتابة البيانات إلى الملف النصي
        if (file_put_contents($file, $data, FILE_APPEND)) {
            echo "تم إضافة الكتاب بنجاح!";
        } else {
            echo "حدث خطأ أثناء حفظ البيانات.";
        }
    }
}
if (file_put_contents($file, $data, FILE_APPEND)) {
    // بعد إضافة الكتاب بنجاح، التوجيه إلى صفحة أخرى
    header("Location: add_book.html");
    exit();
}
?>