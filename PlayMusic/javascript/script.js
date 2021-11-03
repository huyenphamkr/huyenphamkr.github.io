const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const PlAYER_STORAGE_KEY = "F8_PLAYER";

const player = $(".player");
const cd = $(".cd");
const heading = $("header h2");
const cdThumb = $(".cd-thumb");
const audio = $("#audio");
const playBtn = $(".btn-toggle-play");
const progress = $("#progress");
const prevBtn = $(".btn-prev");
const nextBtn = $(".btn-next");
const randomBtn = $(".btn-random");
const repeatBtn = $(".btn-repeat");
const playlist = $(".playlist");

const app = {
  currentIndex: 0,
  isPlaying: false,
  isRandom: false,
  isRepeat: false,
  config: {},
  // (1/2) Uncomment the line below to use localStorage
  // config: JSON.parse(localStorage.getItem(PlAYER_STORAGE_KEY)) || {},
  songs: [
    {
      name: "Beautyfull",
      singer: "Karry Wang",
      path: "./music/Beautiful - Vuong Tuan Khai.mp3",
      image: "./image/beautyfull.jpg"
    },
    {
      name: "Until You",
      singer: "Shayne Ward",
      path: "./music/UntilYou.mp3",
      image:"./image/untilyou.jpg"
    },
    {
      name: "Love Scenario",
      singer: "IKON",
      path:"./music/Love Scenario - IKON.mp3",
      image: "./image/ikon.jpg"
    },
    {
      name: "One Call Away",
      singer: "Charlie Puth",
      path: "./music/One Call Away - Charlie Puth.mp3",
      image:"./image/One_Call_Away.jpg"
    },
    {
      name: "Waiting For Love",
      singer: "Avicii",
      path: "./music/Waiting for Love - Avicii.mp3",
      image:"./image/Waiting for Love - Avicii.jpg"
    },
    {
      name: "DANCE MONKEY",
      singer: "TONES AND I",
      path: "./music/Dance Monkey - Tones And I.mp3",
      image:"./image/TONES AND I - DANCE MONKEY.jpg"
    },
    {
      name: "Perfect",
      singer: "Vương Tuấn Khải (Karry Wang)",
      path: "./music/Perfect-VuongTuanKhaiKarryWang.mp3",
      image:"./image/Perfect - Vương Tuấn Khải.jpg"
    },
    {
      name: "Khi gặp anh",
      singer: "Tát Đỉnh Đỉnh",
      path: "./music/Khi Gap Duoc Em - Tat Dinh Dinh.mp3",
      image:"./image/Khi gặp anh.jpg"
    },
    {
      name: "Shape of You",
      singer: "Ed Sheeran",
      path: "./music/Shape Of You - Ed Sheeran.mp3",
      image:"./image/Shape Of You - Ed Sheeran.jpg"
    },
    {
      name: "8 Letters ",
      singer: "Why Don't We",
      path: "./music/8 Letters - Why Don_t We.mp3",
      image:"./image/Why_Dont_We.jpg"
    },
    {
      name: "Team",
      singer: "Lorde",
      path: "./music/Team - Lorde.mp3",
      image:"./image/Lorde_-_Team.jpg"
    },
    {
      name: "You broke me first",
      singer: "Tate McRae",
      path: "./music/You Broke Me First - Tate McRae.mp3",
      image:"./image/Tate McRae - you broke me first.jpg"
    },
    {
      name: "Dancing With Your Ghost",
      singer: "Sasha Alex Sloan",
      path: "./music/Dancing With Your Ghost - Sasha Sloan.mp3",
      image:"./image/Dancing With Your Ghost - Sasha Sloan.jpg"
    },
    {
      name: "Muộn rồi mà sao còn",
      singer: "Sơn Tùng M-TP",
      path: "./music/Muon Roi Ma Sao Con - Son Tung M-TP.mp3",
      image:"./image/Muon Roi Ma Sao Co.jpg"
    },
    {
      name: "You Don't Know Me",
      singer: "Ofenbach ft. Brodie Barclay",
      path: "./music/You Don_t Know Me - Ofenbach_ Brodie Bar.mp3",
      image:"./image/You Don_t Know Me - Ofenbach_ Brodie Bar.jpg"
    },
    {
      name: "Celebrity",
      singer: "IU(아이유)",
      path: "./music/Celebrity - IU.mp3",
      image:"./image/Celebrity - IU.jpg"
    },
    {
      name: "SÀI GÒN HÔM NAY MƯA",
      singer: "JSOL & HOÀNG DUYÊN",
      path: "./music/Sai Gon Hom Nay Mua - JSOL_ Hoang Duyen.mp3",
      image:"./image/JSOL & HOÀNG DUYÊN-SÀI GÒN HÔM NAY MƯA.jpg"
    },
    {
      name: "Chàng Trai Nhệt Huyết 105°C",
      singer: "A Tứ",
      path: "./music/Nhiet Tam 1050C Cua Cau 1050C.mp3",
      image:"./image/Nhiet Tam 1050C Cua Cau 1050C.jpg"
    },
    {
      name: "TA",
      singer: "Bất Thị Hoa Hỏa Nha ",
      path: "./music/TA - Bat Thi Hoa Hoa Nha.mp3",
      image:"./image/TA - Bat Thi Hoa Hoa Nha.jpg"
    },
    {
      name: "One Day",
      singer: "Matisyahu",
      path: "./music/One Day Matisyahu.mp3",
      image:"./image/One Day Matisyahu.jpg"
    },
    {
      name: "Cho Em Gần Anh Thêm Chút Nữa",
      singer: "Hương Tràm",
      path: "./music/Cho Em Gan Anh Them Chut Nua - Huong Tra.mp3",
      image:"./image/Cho Em Gần Anh Thêm Chút Nữa.jpg"
    },
    {
      name: "Trên Tình Bạn Dưới Tình Yêu",
      singer: "Min",
      path: "./music/TrenTinhBanDuoiTinhYeu.mp3",
      image:"./image/TrenTinhBanDuoiTinhYeu.jpg"
    }
    ,
    {
      name: "Free Loop",
      singer: "Daniel Powter",
      path: "./music/Free Loop - Daniel Powter.mp3",
      image:"./image/3625.jpg"
    }
    ,
    {
      name: "Let Me Down Slowly",
      singer: "Mễ Tiểu Túng Kelly",
      path: "./music/Let Me Down Slowly - Me Tieu Tung Kelly.mp3",
      image:"./image/129017.jpg"
    }    
    ,
    {
      name: "Walk Thru Fire",
      singer: "Vicetone; Meron Ryan",
      path: "./music/Walk Thru Fire - Vicetone_ Meron Ryan.mp3",
      image:"./image/1533518669570_640.jpg"
    }    
    ,
    {
      name: "Wrap Me In Plastic",
      singer: "Chromance",
      path: "./music/Wrap Me In Plastic - Chromance.mp3",
      image:"./image/638959065.jpg"
    }    
    ,
    {
      name: "Sứ Thanh Hoa Remix",
      singer: "吴 光 腾",
      path: "./music/SuThanhHoa.mp3",
      image:"./image/artworks-Dp9oAQulu3yBicAd-RKADnA-t500x500.jpg"
    }
    ,
    {
      name: "Gặp em đúng lúc",
      singer: "吴 光 腾",
      path: "./music/GapEmDungLucVietnameseCover-ThaiQuynh-5849067.mp3",
      image:"./image/8589f89c0260f4c03fe8b4822e096297.jpg"
    }     
    ,
    {
      name: "No Roots",
      singer: "Alice Merton",
      path: "./music/No Roots - Alice Merton.mp3",
      image:"./image/8589f89c0260f4c03fe8b4822e096297.jpg"
    }     
    ,
    {
      name: "Lone Ranger",
      singer: "Rachel Platten",
      path: "./music/Lone Ranger - Rachel Platten.mp3",
      image:"./image/8589f89c0260f4c03fe8b4822e096297.jpg"
    }     
    ,
    {
      name: "I'm Not Her",
      singer: "Clara Mae",
      path: "./music/I_m Not Her - Clara Mae.mp3",
      image:"./image/1519359829120_640.jpg"
    }
  ],
  setConfig: function (key, value) {
    this.config[key] = value;
    // (2/2) Uncomment the line below to use localStorage
    // localStorage.setItem(PlAYER_STORAGE_KEY, JSON.stringify(this.config));
  },
  render: function () {
    const htmls = this.songs.map((song, index) => {
      return `
                        <div class="song ${
                          index === this.currentIndex ? "active" : ""
                        }" data-index="${index}">
                            <div class="thumb"
                                style="background-image: url('${song.image}')">
                            </div>
                            <div class="body">
                                <h3 class="title">${song.name}</h3>
                                <p class="author">${song.singer}</p>
                            </div>
                            <div class="option">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                    `;
    });
    playlist.innerHTML = htmls.join("");
  },
  defineProperties: function () {
    Object.defineProperty(this, "currentSong", {
      get: function () {
        return this.songs[this.currentIndex];
      }
    });
  },
  handleEvents: function () {
    const _this = this;
    const cdWidth = cd.offsetWidth;

    // Xử lý CD quay / dừng
    // Handle CD spins / stops
    const cdThumbAnimate = cdThumb.animate([{ transform: "rotate(360deg)" }], {
      duration: 10000, // 10 seconds
      iterations: Infinity
    });
    cdThumbAnimate.pause();

    // Xử lý phóng to / thu nhỏ CD
    // Handles CD enlargement / reduction
    document.onscroll = function () {
      const scrollTop = window.scrollY || document.documentElement.scrollTop;
      const newCdWidth = cdWidth - scrollTop;

      cd.style.width = newCdWidth > 0 ? newCdWidth + "px" : 0;
      cd.style.opacity = newCdWidth / cdWidth;
    };

    // Xử lý khi click play
    // Handle when click play
    playBtn.onclick = function () {
      if (_this.isPlaying) {
        audio.pause();
      } else {
        audio.play();
      }
    };

    // Khi song được play
    // When the song is played
    audio.onplay = function () {
      _this.isPlaying = true;
      player.classList.add("playing");
      cdThumbAnimate.play();
    };

    // Khi song bị pause
    // When the song is pause
    audio.onpause = function () {
      _this.isPlaying = false;
      player.classList.remove("playing");
      cdThumbAnimate.pause();
    };

    // Khi tiến độ bài hát thay đổi
    // When the song progress changes
    audio.ontimeupdate = function () {
      if (audio.duration) {
        const progressPercent = Math.floor(
          (audio.currentTime / audio.duration) * 100
        );
        progress.value = progressPercent;
      }
    };

    // Xử lý khi tua song
    // Handling when seek
    progress.onchange = function (e) {
      const seekTime = (audio.duration / 100) * e.target.value;
      audio.currentTime = seekTime;
    };

    // Khi next song
    // When next song
    nextBtn.onclick = function () {
      if (_this.isRandom) {
        _this.playRandomSong();
      } else {
        _this.nextSong();
      }
      audio.play();
      _this.render();
      _this.scrollToActiveSong();
    };

    // Khi prev song
    // When prev song
    prevBtn.onclick = function () {
      if (_this.isRandom) {
        _this.playRandomSong();
      } else {
        _this.prevSong();
      }
      audio.play();
      _this.render();
      _this.scrollToActiveSong();
    };

    // Xử lý bật / tắt random song
    // Handling on / off random song
    randomBtn.onclick = function (e) {
      _this.isRandom = !_this.isRandom;
      _this.setConfig("isRandom", _this.isRandom);
      randomBtn.classList.toggle("active", _this.isRandom);
    };

    // Xử lý lặp lại một song
    // Single-parallel repeat processing
    repeatBtn.onclick = function (e) {
      _this.isRepeat = !_this.isRepeat;
      _this.setConfig("isRepeat", _this.isRepeat);
      repeatBtn.classList.toggle("active", _this.isRepeat);
    };

    // Xử lý next song khi audio ended
    // Handle next song when audio ended
    audio.onended = function () {
      if (_this.isRepeat) {
        audio.play();
      } else {
        nextBtn.click();
      }
    };

    // Lắng nghe hành vi click vào playlist
    // Listen to playlist clicks
    playlist.onclick = function (e) {
      const songNode = e.target.closest(".song:not(.active)");

      if (songNode || e.target.closest(".option")) {
        // Xử lý khi click vào song
        // Handle when clicking on the song
        if (songNode) {
          _this.currentIndex = Number(songNode.dataset.index);
          _this.loadCurrentSong();
          _this.render();
          audio.play();
        }

        // Xử lý khi click vào song option
        // Handle when clicking on the song option
        if (e.target.closest(".option")) {
        }
      }
    };
  },
  scrollToActiveSong: function () {
    setTimeout(() => {
      $(".song.active").scrollIntoView({
        behavior: "smooth",
        block: "nearest"
      });
    }, 300);
  },
  loadCurrentSong: function () {
    heading.textContent = this.currentSong.name;
    cdThumb.style.backgroundImage = `url('${this.currentSong.image}')`;
    audio.src = this.currentSong.path;
  },
  loadConfig: function () {
    this.isRandom = this.config.isRandom;
    this.isRepeat = this.config.isRepeat;
  },
  nextSong: function () {
    this.currentIndex++;
    if (this.currentIndex >= this.songs.length) {
      this.currentIndex = 0;
    }
    this.loadCurrentSong();
  },
  prevSong: function () {
    this.currentIndex--;
    if (this.currentIndex < 0) {
      this.currentIndex = this.songs.length - 1;
    }
    this.loadCurrentSong();
  },
  playRandomSong: function () {
    let newIndex;
    do {
      newIndex = Math.floor(Math.random() * this.songs.length);
    } while (newIndex === this.currentIndex);

    this.currentIndex = newIndex;
    this.loadCurrentSong();
  },
  start: function () {
    // Gán cấu hình từ config vào ứng dụng
    // Assign configuration from config to application
    this.loadConfig();

    // Định nghĩa các thuộc tính cho object
    // Defines properties for the object
    this.defineProperties();

    // Lắng nghe / xử lý các sự kiện (DOM events)
    // Listening / handling events (DOM events)
    this.handleEvents();

    // Tải thông tin bài hát đầu tiên vào UI khi chạy ứng dụng
    // Load the first song information into the UI when running the app
    this.loadCurrentSong();

    // Render playlist
    this.render();

    // Hiển thị trạng thái ban đầu của button repeat & random
    // Display the initial state of the repeat & random button
    randomBtn.classList.toggle("active", this.isRandom);
    repeatBtn.classList.toggle("active", this.isRepeat);
  }
};

app.start();
