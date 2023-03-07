const getAll = document.querySelectorAll.bind(document);
const getOne = document.querySelector.bind(document);

//Sự kiện tăng giảm số lượng sản phẩm giỏ hàng
const inputQuantity = document.querySelectorAll(".c-input-text");

Array.from(inputQuantity).forEach((item) => {
    const btnDecrease = document.querySelector(
        `.quantity-box .decrease[data-id="${item.dataset.id}"]`
    );
    const btnIncrease = document.querySelector(
        `.quantity-box .increase[data-id="${item.dataset.id}"]`
    );
    const message = document.querySelector(
        `.quantity-box .message[data-id="${item.dataset.id}"]`
    );

    const maxValue = parseInt(item.getAttribute("maxValue"));

    visibilityBtn();

    btnDecrease.addEventListener("click", () => upDownValue(-1));
    btnIncrease.addEventListener("click", () => upDownValue(1));
    item.addEventListener("change", () => visibilityBtn());

    //Thay đổi số lượng, ẩn hiện nút khi click tăng giảm
    function upDownValue(option) {
        let itemValue = parseInt(item.value);
        if (option == 1) {
            item.value = itemValue + 1;
            itemValue = parseInt(item.value);
        }
        if (option == -1) {
            item.value = itemValue - 1;
            itemValue = parseInt(item.value);
        }
        visibilityBtn();
    }

    //Ẩn hiện nút theo số lượng
    function visibilityBtn() {
        if (parseInt(item.value) <= 1 || !item.value) {
            item.value = 1;
            btnDecrease.classList.remove("show");
            btnIncrease.classList.add("show");
            message.textContent = "";
        } else if (parseInt(item.value) >= maxValue) {
            item.value = parseInt(maxValue);
            MaxValueMess();
            btnIncrease.classList.remove("show");
            btnDecrease.classList.add("show");
        } else {
            btnDecrease.classList.add("show");
            btnIncrease.classList.add("show");
            message.textContent = "";
        }
    }

    //Hiện thông báo quá số lượng
    function MaxValueMess() {
        message.style.visibility = "visible";
        message.textContent = "Đã đạt giới hạn tồn kho";
        setTimeout(() => {
            message.style.visibility = "hidden";
        }, 1000);
    }
});

//Hiển thị thông báo thêm vào giỏ hàng thành công
const listBtnShow = document.querySelectorAll(".add-cart-notify");
const modal = document.querySelector(".modal");
const notifyIcon = document.querySelector(".notify-icon");
const notifyTitle = document.querySelector(".notify-title");

Array.from(listBtnShow).forEach((item) => {
    item.onclick = () => {
        showNotify("Đã thêm vào giỏ hàng!", "bag-check-outline", 1500);
    };
});

function showNotify(title, name, time) {
    notifyIcon.name = name;
    notifyTitle.textContent = title;
    modal.classList.add("show");

    setTimeout(() => {
        modal.classList.remove("show");
    }, time);
}

var navList = document.querySelectorAll(".nav-item");
// console.log(navList)

/* ..............................................
       Scroll
       ................................................. */

$(window).load(function () {
    $("#loader__effect")
        .delay(1000)
        .fadeOut("fast", function () {
            $("#loader__wrap").removeClass("loader__wrap");
        });
});

/* */
/**button toggle dark mode */
const body = document.querySelector("body");
const toggleMode = document.getElementById("toggle__mode");
const mode_key = "NIGHT-MODE";

/* lưu night mode vào local */
const settingMode = {
    get() {
        return JSON.parse(localStorage.getItem(mode_key)) || [];
    },
    set(mode) {
        localStorage.setItem(mode_key, JSON.stringify(mode));
    },
};
const mode = {
    nightMode: settingMode.get().nightMode,
};

body.classList.toggle("dark", mode.nightMode);

if(toggleMode) {
    // body.classList.toggle('dark',settingMode.get().nightMode)
    toggleMode.onclick = function () {
        mode.nightMode = !mode.nightMode;
        settingMode.set(mode);
        const check = settingMode.get(mode);
    
        // console.log(check.nightMode);
        body.classList.toggle("dark", check.nightMode);
    };
}

/* ..............................................
Hàm Count up number
 ................................................. */

 function countUpElement(element, delay = 2000, unit = 10) {
    $(document).ready(function () {
        $(element).counterUp({
            //* đơn vị nhảy
            delay: unit,
            //* delay time
            time: delay
        });
    });
};


/*So sanh điểm user và voucher */
const btnShowAskOptions = getAll(".show-ask-options");
const askOptions = getAll(".ask-options");
const askOptionsNo = getAll(".ask-options--no");
const askOptionsYes = getAll(".ask-options--yes");

//tắt bảng options
function closeAskOptionsShow() {
    const askOptionsShow = getOne(".ask-options.show");
    if (askOptionsShow) {
        askOptionsShow.classList.remove("show");
    }
}

//mở bảng options tại vị trí chỉ định
function openAskOptions(index) {
    if (askOptions) {
        askOptions[index].classList.add("show");
    }
}

//click ra ngoài để tắt bảng options
window.onclick = (e) => {
    if (
        !e.target.closest(".show-ask-options") &&
        !e.target.closest(".ask-options")
    ) {
        closeAskOptionsShow();
    }
};

var voucherContainer = getAll(".voucher__container");
var voucherPoint = getAll(".voucher__point");
var userPoint = getOne(".user-point__value");

//Load các giá trị điểm khi tải trang
countUpElement(".user-point__value", 2000);
countUpElement(".voucher__point span", 1500);
countUpElement('.voucher__value-percent', 2000)

if (
    userPoint &&
    voucherPoint &&
    voucherContainer &&
    btnShowAskOptions &&
    askOptionsYes &&
    askOptionsNo
) {
    //cập nhật trạng thái voucher
    function updateVoucherState() {
        var currentUserPoint = parseInt(userPoint.dataset.point);
        voucherContainer.forEach((item, index) => {
            var voucherPointIndex = parseInt(voucherPoint[index].dataset.point);
            // đủ điểm
            if (currentUserPoint < voucherPointIndex) {
                item.classList.add("disable-voucher");
                askOptionsYes[index].removeAttribute("href");
            }
        });

        return currentUserPoint;
    }

    var currentUserPoint = updateVoucherState();

    //xử lý logic ẩn hiện voucher
    voucherContainer.forEach((item, index) => {
        var voucherPointIndex = parseInt(voucherPoint[index].dataset.point);
        // đủ điểm
        if (currentUserPoint > voucherPointIndex) {
            //Ấn mở bảng
            btnShowAskOptions[index].addEventListener("click", () => {
                closeAskOptionsShow();
                openAskOptions(index);
            });
            //Ấn "Hủy"
            askOptionsNo[index].addEventListener("click", closeAskOptionsShow);
            //Ấn "Đồng ý"
            askOptionsYes[index].addEventListener("click", () => {
                //Trừ điểm
                currentUserPoint -= voucherPointIndex;
                //Kiêm tra điêm < 0;
                var getCurrentUserPoint =
                    currentUserPoint < 0 ? 0 : currentUserPoint;
                //Gán giá trị sau khi trừ
                userPoint.innerHTML = getCurrentUserPoint;
                userPoint.dataset.point = getCurrentUserPoint;
                closeAskOptionsShow();
                updateVoucherState();
                countUpElement(".user-point__value", 2000);
            });
        }
    });
}

/* ..............................................
Hiển thị phí ship
................................................. */

function formatCash(str) {
    return str.split('').reverse().reduce((prev, next, index) => {
        return ((index % 3) ? next : (next + ',')) + prev
    })
}

/*INITIALIZE AOS */
AOS.init();