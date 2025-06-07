<?php
$success = isset($_GET['success']) && $_GET['success'] == '1';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <meta charset="UTF-8">
    <title>طلب المخيم الصيفي</title>
    <!-- Chargement unique du CSS Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
            body {
      font-family: Arial, sans-serif;
      direction: rtl;
    }
    .form-group {
      margin-bottom: 10px;
    }
        /* Reset minimal */
* {
  box-sizing: border-box;
}

/* Container principal */
.form-container {
  max-width: 900px;
  margin: 30px auto;
  background: #fff;
  padding: 30px 40px;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  direction: rtl;
  color: #333;
}

/* Titre principal */
.form-title {
  text-align: center;
  font-size: 2.2rem;
  margin-bottom: 30px;
  color: #0d6efd;
  font-weight: 700;
}

/* Sections */
.form-section {
  margin-bottom: 35px;
  border-bottom: 1px solid #eaeaea;
  padding-bottom: 25px;
}

.form-section h3 {
  font-size: 1.6rem;
  margin-bottom: 20px;
  color: #333;
  border-right: 5px solid #0d6efd;
  padding-right: 10px;
}

/* Ligne contenant plusieurs inputs */
.form-row {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  justify-content: flex-start;
}

/* Groupe label + input */
.form-group {
  flex: 1 1 200px;
  display: flex;
  flex-direction: column;
}

/* Label */
.form-group label {
  margin-bottom: 6px;
  font-weight: 600;
  color: #444;
  cursor: pointer;
  font-size: 1rem;
}

/* Marqueur des champs obligatoires */
label.required::after {
  content: " *";
  color: #dc3545;
  font-weight: bold;
  margin-left: 4px;
}

/* Champs input */
.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="date"],
.form-group input.flatpickr-date {
  padding: 10px 12px;
  border: 2px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
  transition: border-color 0.3s;
  text-align: right;
  direction: rtl;
}

.form-group input[type="text"]:focus,
.form-group input[type="email"]:focus,
.form-group input[type="tel"]:focus,
.form-group input[type="date"]:focus,
.form-group input.flatpickr-date:focus {
  border-color: #0d6efd;
  outline: none;
  box-shadow: 0 0 5px rgba(13,110,253,0.5);
}

/* Tableau des accompagnants */
.accompagnants-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 1rem;
  text-align: center;
  direction: rtl;
}

.accompagnants-table th,
.accompagnants-table td {
  border: 1px solid #ccc;
  padding: 10px 8px;
}

.accompagnants-table th {
  background-color: #0d6efd;
  color: white;
  font-weight: 700;
}

.accompagnants-table input[type="text"] {
  width: 100%;
  padding: 6px 8px;
  border: 1.5px solid #ddd;
  border-radius: 6px;
  text-align: right;
  direction: rtl;
  font-size: 1rem;
  transition: border-color 0.3s;
}

.accompagnants-table input[type="text"]:focus {
  border-color: #0d6efd;
  outline: none;
  box-shadow: 0 0 4px rgba(13,110,253,0.6);
}

/* Bouton de soumission */
.form-submit {
  text-align: center;
  margin-top: 35px;
}

.submit-btn {
  background-color: #0d6efd;
  color: white;
  padding: 14px 40px;
  font-size: 1.3rem;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  font-weight: 700;
  box-shadow: 0 5px 15px rgba(13,110,253,0.4);
  transition: background-color 0.3s;
  user-select: none;
}

.submit-btn:hover {
  background-color: #0848c5;
}

/* Responsive: sur petits écrans, empile les champs */
@media (max-width: 720px) {
  .form-row {
    flex-direction: column;
  }

  .form-group {
    width: 100%;
  }
}

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .flatpickr-date {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
        }
        .form-container {
            max-width: 900px;
            margin: 20px auto;
            padding: 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .form-title {
            color: #007bff;
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
        }

        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .form-section h3 {
            color: #0056b3;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="tel"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .required::after {
            content: " *";
            color: red;
        }

        .accompagnants-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .accompagnants-table th,
        .accompagnants-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .accompagnants-table input {
            width: 100%;
            border: none;
            padding: 5px;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 30px auto 0;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
        .custom-select-wrapper {
  position: relative;
  width: 100%;
}

.custom-select-wrapper select {
  appearance: none; /* supprime la flèche native */
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 100%;
  padding: 12px 40px 12px 12px;
  font-size: 1rem;
  border: 2px solid #ddd;
  border-radius: 8px;
  cursor: pointer;
  text-align: right;
  direction: rtl;
  background-color: white;
  transition: border-color 0.3s;
}

.custom-select-wrapper select:focus {
  border-color: #0d6efd;
  outline: none;
  box-shadow: 0 0 6px rgba(13,110,253,0.6);
}

/* Flèche personnalisée */
.custom-select-wrapper::after {
  content: "▼";
  position: absolute;
  top: 50%;
  left: 12px; /* à gauche en RTL */
  transform: translateY(-50%);
  font-size: 0.8rem;
  color: #555;
  pointer-events: none;
  user-select: none;
}
.custom-select-wrapper select {
  appearance: none;
  width: 100%;
  padding: 12px 40px 12px 12px;
  font-size: 1.4rem; /* <-- taille de police agrandie */
  border: 2px solid #ddd;
  border-radius: 8px;
  cursor: pointer;
  text-align: right;
  direction: rtl;
  background-color: white;
  transition: border-color 0.3s;
}

    select {
  font-size: 1.2rem; /* taille un peu plus grande */
}
 body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding: 20px;
    background: #f9f9f9;
  }
  .form-group {
    max-width: 400px;
    margin: auto;
  }
  label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    font-size: 1.2rem;
  }
  .custom-select-wrapper {
    position: relative;
    width: 100%;
  }
  .custom-select-wrapper select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 100%;
    padding: 12px 40px 12px 12px;
    font-size: 1.3rem; /* police agrandie */
    border: 2px solid #ddd;
    border-radius: 8px;
    cursor: pointer;
    text-align: right;
    direction: rtl;
    background-color: white;
    transition: border-color 0.3s;
  }
  .custom-select-wrapper select:focus {
    border-color: #0d6efd;
    outline: none;
    box-shadow: 0 0 6px rgba(13,110,253,0.6);
  }
  /* Flèche personnalisée */
  .custom-select-wrapper::after {
    content: "▼";
    position: absolute;
    top: 50%;
    left: 12px; /* à gauche en RTL */
    transform: translateY(-50%);
    font-size: 0.9rem;
    color: #555;
    pointer-events: none;
    user-select: none;
  }    
        body { font-family: 'Arial', sans-serif; direction: rtl; }
  #calendar {
    width: 300px;
    margin: 20px auto;
    border: 1px solid #004080;
    padding: 10px;
    background: #f0f8ff;
  }
  #calendar table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
  }
  #calendar th {
    background-color: #004080;
    color: white;
    padding: 5px 0;
  }
  #calendar td {
    padding: 8px 0;
    border: 1px solid #ccc;
    cursor: pointer;
  }
  #calendar td:hover {
    background-color: #cce0ff;
  } 
        
    </style>
</head>
<body>

<div class="form-container">
    <h2 class="form-title">طلب الاستفادة من مساهمة اللجنة في الخدمات الصيفية</h2>
    
    <form action="submit_vacances.php" method="POST" enctype="multipart/form-data">
        
        <!-- Section 1: Informations personnelles -->
        <div class="form-section">
            <h3>المعلومات الشخصية</h3>
            <div class="form-row">
                   <div class="form-group">
        <label class="required">رقم التسجيل:</label>
        <input type="text" name="matricule" required>
    </div>
                <div class="form-group">
    <label class="required">البريد الإلكتروني:</label>
    <input type="email" name="email" required>
</div>
                <div class="form-group">
                    <label class="required">اللقب (العامل):</label>
                    <input type="text" name="nom" required>
                </div>
                <div class="form-group">
                    <label>اللقب الأصلي للمتزوجة:</label>
                    <input type="text" name="nom_original">
                </div>
                <div class="form-group">
                    <label class="required">الاسم:</label>
                    <input type="text" name="prenom" required>
                </div>
            </div>

            <div class="form-row">
     <div class="form-group" lang="ar" dir="rtl">
  <label for="date_naissance" class="required">تاريخ الميلاد:</label>
  <input type="date" id="date_naissance" name="date_naissance" required>
</div>

                <div class="form-group">
                    <label class="required">مكان الميلاد :</label>
                    <input type="text" name="lieu_naissance" required>
                </div>
                <div class="form-group">
                    <label class="required">العنوان الشخصي:</label>
                    <input type="text" name="adresse" required>
                </div>
            </div>
        </div>

        <!-- Section 2: Professionnelle -->
        <div class="form-section">
            <h3>المعلومات المهنية</h3>
            <div class="form-row">
                <div class="form-group">
                    <label class="required">الوظيفة:</label>
                    <input type="text" name="fonction" required>
                </div>
                <div class="form-group">
                    <label class="required">مكان العمل:</label>
                    <input type="text" name="lieu_travail" required>
                </div>
            </div>
        </div>

        <!-- Section 3: Contact -->
        <div class="form-section">
            <h3>معلومات الاتصال</h3>
            <div class="form-row">
                <div class="form-group">
                    <label class="required">رقم الهاتف:</label>
                    <input type="tel" name="telephone" required>
                </div>
                      </div>
        </div>

        <!-- Section 4: Camp -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />


<div class="form-group">
  <label class="required">الوجهة:</label>
  <div class="custom-select-wrapper">
    <select name="destination" required>
      <option value="" disabled selected>اختر الوجهة</option>
      <option value="مرسى بن مهيدي">مرسى بن مهيدي</option>
      <option value="تارقة - عين تموشنت">تارقة - عين تموشنت</option>
      <option value="بني صاف">بني صاف</option>
    </select>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
  const choices = new Choices('#destination', {
    searchEnabled: true,
    shouldSort: false,
    itemSelectText: '',
    position: 'bottom',
    rtl: true
  });
</script>


            </div>
        </div>

        <!-- Section 5: Accompagnants -->
        <div class="form-section">
            <h3>قائمة المرافقين</h3>
            <table class="accompagnants-table">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>الاسم واللقب</th>
                        <th>تاريخ الإزدياد</th>
                        <th>صلة القرابة</th>
                        <th>ملاحظات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                    <tr>
                        <td><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></td>
                        <td><input type="text" name="accompagnant<?php echo $i; ?>_nom"></td>
                        <td><input type="text" id="accompagnant<?php echo $i; ?>_naissance" name="accompagnant<?php echo $i; ?>_naissance" class="flatpickr-date" placeholder="يوم/شهر/سنة"></td>
                        <td><input type="text" name="accompagnant<?php echo $i; ?>_lien"></td>
                        <td><input type="text" name="accompagnant<?php echo $i; ?>_notes"></td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <div class="form-submit">
            <button type="submit" class="submit-btn">تقديم الطلب</button>
        </div>
    </form>
</div>

<!-- Chargement des scripts JS UNIQUEMENT UNE FOIS à la fin du body -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Configuration optimisée pour Flatpickr
        flatpickr(".flatpickr-date", {
            locale: "ar",
            dateFormat: "d/m/Y",
            allowInput: true,
            clickOpens: true,    // Active l'ouverture au clic
            disableMobile: false, // Désactive le sélecteur natif sur mobile
            static: true,         // Meilleur positionnement
            monthSelectorType: 'static',
            onReady: function() {
                console.log("Flatpickr prêt");
            },
            onOpen: function() {
                console.log("Calendrier ouvert");
            },
            onClose: function() {
                console.log("Calendrier fermé");
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr("#date_naissance", {
      dateFormat: "d/m/Y",
      maxDate: "today"
    });
  </script>

<div id="calendar"></div>

<script>
  const monthsAr = ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان", "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"];
  const daysAr = ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"];

  function buildCalendar(year, month) {
    const calendar = document.getElementById("calendar");
    calendar.innerHTML = "";

    // Titre mois + année
    const title = document.createElement("h3");
    title.textContent = monthsAr[month] + " " + year;
    calendar.appendChild(title);

    // Table calendrier
    const table = document.createElement("table");
    const thead = document.createElement("thead");
    const headRow = document.createElement("tr");
    // En RTL, le premier jour affiché à droite est samedi (حسب تقويمك)
    for(let i = 6; i >= 0; i--) {
      const th = document.createElement("th");
      th.textContent = daysAr[i];
      headRow.appendChild(th);
    }
    thead.appendChild(headRow);
    table.appendChild(thead);

    const tbody = document.createElement("tbody");

    const firstDay = new Date(year, month, 1);
    let startDay = firstDay.getDay(); // 0=dimanche ... 6=samedi
    // En JS dimanche=0, mais en arabe souvent on commence par السبت (samedi)
    // On inverse l'ordre dans l'affichage (RTL), donc on adapte ici si besoin

    const daysInMonth = new Date(year, month+1, 0).getDate();

    let dayCounter = 1;
    for(let week=0; week<6; week++) {
      const tr = document.createElement("tr");
      for(let d=6; d>=0; d--) {
        const td = document.createElement("td");
        // Calcul position des jours
        if(week === 0 && d > (6 - startDay)) {
          td.textContent = "";
        } else if(dayCounter > daysInMonth) {
          td.textContent = "";
        } else {
          td.textContent = dayCounter;
          dayCounter++;
        }
        tr.appendChild(td);
      }
      tbody.appendChild(tr);
      if(dayCounter > daysInMonth) break;
    }

    table.appendChild(tbody);
    calendar.appendChild(table);
  }

  const today = new Date();
  buildCalendar(today.getFullYear(), today.getMonth());
</script>
</body>
</html>