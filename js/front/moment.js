Format Dates
moment().format('MMMM Do YYYY, h:mm:ss a'); // November 26 2018, 7:25:18 malam
moment().format('dddd');                    // Senin
moment().format("MMM Do YY");               // Nov 26 18
moment().format('YYYY [escaped] YYYY');     // 2018 escaped 2018
moment().format();                          // 2018-11-26T19:25:18+07:00
Relative Time
moment("20111031", "YYYYMMDD").fromNow(); // 7 tahun yang lalu
moment("20120620", "YYYYMMDD").fromNow(); // 6 tahun yang lalu
moment().startOf('day').fromNow();        // 19 jam yang lalu
moment().endOf('day').fromNow();          // dalam 5 jam
moment().startOf('hour').fromNow();       // 25 menit yang lalu
Calendar Time
moment().subtract(10, 'days').calendar(); // 16/11/2018
moment().subtract(6, 'days').calendar();  // Selasa lalu pukul 19.25
moment().subtract(3, 'days').calendar();  // Jumat lalu pukul 19.25
moment().subtract(1, 'days').calendar();  // Kemarin pukul 19.25
moment().calendar();                      // Hari ini pukul 19.25
moment().add(1, 'days').calendar();       // Besok pukul 19.25
moment().add(3, 'days').calendar();       // Kamis pukul 19.25
moment().add(10, 'days').calendar();      // 06/12/2018
Multiple Locale Support
moment.locale();         // id
moment().format('LT');   // 19.25
moment().format('LTS');  // 19.25.18
moment().format('L');    // 26/11/2018
moment().format('l');    // 26/11/2018
moment().format('LL');   // 26 November 2018
moment().format('ll');   // 26 Nov 2018
moment().format('LLL');  // 26 November 2018 pukul 19.25
moment().format('lll');  // 26 Nov 2018 pukul 19.25
moment().format('LLLL'); // Senin, 26 November 2018 pukul 19.25
moment().format('llll'); // Sen, 26 Nov 2018 pukul 19.25
