<?php
include './inc/conn.php';
include './inc/form.php';

$sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1 ';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);



mysqli_free_result($result);
mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <title>Ali</title>

</head>


    <body>
<canvas id="fireworks"></canvas>

    <!-- الكونتينر فوق -->
    <div class="top-container">
        <img src="images/SaudiaAirlines-01.svg" alt="SaudiaAirlines">
        <h1 class="display-4 fw-normal">اربح مع الخطوط السعودية</h1>
        <p class="lead fw-normal">باقي على انتهاء التسجيل</p>
        <h3 id="countDown" class="count-box"></h3>
        <p class="lead-fw-normal">للسحب على تذكرة سفر مجانية للعلا  </p>
       
    

    <!-- باقي الصفحة -->
    <ul class="list-group list-group-flush">
        <li class="list-group-item">شروط المسابقة</li>
        <li class="list-group-item">1-متابعة صفحة الخطوط على السناب و x و الانستقرام</li>
        <li class="list-group-item">2-يسمح لكل مشارك بمشاركة واحدة فقط</li>
        <li class="list-group-item">3-يجب التأكد من بيانات المشارك</li>
        <li class="list-group-item">4-لا يمكن استبدال التذكره بمقابل مادي او التعديل على الوجهة</li>
    </ul>
</div>
    <!-- الفورم -->

    <div class="form-container">
    <h3 class="text-center mb-4">الرجاء ادخال معلوماتك</h3>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <div class="mb-3">
            <label for="firstName" class="form-label">الاسم الاول</label>
            <input type="text" name="firstName" id="firstName" class="form-control input-small"
                value="<?php echo $firstName ?>">
            <div class="form-text error"><?php echo $errors['firstNameError'] ?></div>
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">الاسم الاخير</label>
            <input type="text" name="lastName" id="lastName" class="form-control input-small"
                value="<?php echo $lastName ?>">
            <div class="form-text error"><?php echo $errors['lastNameError'] ?></div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="text" name="email" id="email" class="form-control input-small"
                value="<?php echo $email ?>">
            <div class="form-text error"><?php echo $errors['emailError'] ?></div>
        </div>

        <button type="submit" name="submit" id= "send" class="btn btn-primary w-100">ارسال المعلومات</button>
    </form>
</div>


    
    </div>
<div class="loader-con">
    <div id="loader">
        <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
</div>



    <!-- Button trigger modal -->
    <div class="d-grid gap-2 col-6 mx-auto my-5">
        <button type="button" id="winner" class="btn btn-primary">
           <p class="winner-text">اختيار الفائز</p> 
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class=" modal-title" id="modalLabel">الفائز معنا</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php foreach ($users as $user): ?>
                    <div class=" display-3 text-center modal-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($user['firstName'] ?? '') . '  ' . htmlspecialchars($user['lastName'] ?? '') ?>
                        </h5>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
    <div id="cards" class="row mb-5 pb-5">


        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title"><?php echo htmlspecialchars($user['lastName'] ?? ''); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($user['email'] ?? ''); ?> </p>
                </div>
            </div>
        </div>

    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/loader.js"></script>
    <script src="./js/script.js"></script>

</body>

</html>