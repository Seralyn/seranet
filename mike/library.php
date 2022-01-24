<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- IMPORT BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- IMPORT GOOGLE FONT -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">  -->

    <link rel="stylesheet" type="text/css" href="loggedInStyle.css">
    <title>Games Library</title>
</head>

<body>
    <div class="container">
        <div class="row centered-text">
            <div class="col-9">
                <?php echo "<h1>Welcome " . $_SESSION['username'] . ", to your Games Library</h1>"; ?>
            </div>
            <div class="col-3" id="logoutButton">
                    <button type="button" class="btn btn-primary" onclick="location.href='logout.php'">Logout</button>
            </div>  
        </div> <br> <br>

        <div class="row justify-content-center">
            <div class="col-6 justify-content-center d-flex">
                <button type="button" class="btn btn-primary" id="addGameBtn" onclick="location.href='addGame.php'" value="Add Game">Add Game</button>
            </div>
        </div>

        <div class="row d-flex btn justify-content-center">
            <div class="col-9">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for games..">
            </div>
        </div>

        <div class="tg-wrap row">
            <table id="tg-EM4pL" class="tg">
                <thead>
                    <tr>
                        <th class="tg-5g05">Title</th>
                        <th class="tg-5g05">System</th>
                        <th class="tg-5g05">Release Year</th>
                        <th class="tg-5g05">Genre</th>
                        <th class="tg-5g05">Condition</th>
                        <th class="tg-5g05">Have Case?</th>
                        <th class="tg-5g05">Have Booklet?</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                
                $con = mysqli_connect("localhost", "seralyn", "Tiamat1984", "mikesDB");
                // Check connection
                if (mysqli_connect_errno())
                {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                
                $result = mysqli_query($con,
                "SELECT
                    id, 
                    title, 
                    system, 
                    releaseYear, 
                    genre, 
                    gameCondition,  
                    IF(haveCase, 'Yes', 'No') haveCase,
                    IF(haveBooklet, 'Yes', 'No') haveBooklet
                FROM 
                    games");
                
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td class='tg-7zrl'>" . $row['title'] . "</td>";
                    echo "<td class='tg-7zrl'>" . $row['system'] . "</td>";
                    echo "<td class='tg-7zrl'>" . $row['releaseYear'] . "</td>";
                    echo "<td class='tg-7zrl'>" . $row['genre'] . "</td>";
                    echo "<td class='tg-7zrl'>" . $row['gameCondition'] . "</td>";
                    echo "<td class='tg-7zrl'>" . $row['haveCase'] . "</td>";
                    echo "<td class='tg-7zrl'>" . $row['haveBooklet'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                
                mysqli_close($con);
                ?>
        </div>
        
    </div> <!-- container end -->

    


    <script charset="utf-8">

        // TABLE SORTING ASC-DESC
        var TGSort = window.TGSort || function(n) {
            "use strict";

            function r(n) {
                return n ? n.length : 0
            }

            function t(n, t, e, o = 0) {
                for (e = r(n); o < e; ++o) t(n[o], o)
            }

            function e(n) {
                return n.split("").reverse().join("")
            }

            function o(n) {
                var e = n[0];
                return t(n, function(n) {
                    for (; !n.startsWith(e);) e = e.substring(0, r(e) - 1)
                }), r(e)
            }

            function u(n, r, e = []) {
                return t(n, function(n) {
                    r(n) && e.push(n)
                }), e
            }
            var a = parseFloat;

            function i(n, r) {
                return function(t) {
                    var e = "";
                    return t.replace(n, function(n, t, o) {
                        return e = t.replace(r, "") + "." + (o || "").substring(1)
                    }), a(e)
                }
            }
            var s = i(/^(?:\s*)([+-]?(?:\d+)(?:,\d{3})*)(\.\d*)?$/g, /,/g),
                c = i(/^(?:\s*)([+-]?(?:\d+)(?:\.\d{3})*)(,\d*)?$/g, /\./g);

            function f(n) {
                var t = a(n);
                return !isNaN(t) && r("" + t) + 1 >= r(n) ? t : NaN
            }

            function d(n) {
                var e = [],
                    o = n;
                return t([f, s, c], function(u) {
                    var a = [],
                        i = [];
                    t(n, function(n, r) {
                        r = u(n), a.push(r), r || i.push(n)
                    }), r(i) < r(o) && (o = i, e = a)
                }), r(u(o, function(n) {
                    return n == o[0]
                })) == r(o) ? e : []
            }

            function v(n) {
                if ("TABLE" == n.nodeName) {
                    for (var a = function(r) {
                            var e, o, u = [],
                                a = [];
                            return function n(r, e) {
                                e(r), t(r.childNodes, function(r) {
                                    n(r, e)
                                })
                            }(n, function(n) {
                                "TR" == (o = n.nodeName) ? (e = [], u.push(e), a.push(n)) : "TD" != o && "TH" != o || e.push(n)
                            }), [u, a]
                        }(), i = a[0], s = a[1], c = r(i), f = c > 1 && r(i[0]) < r(i[1]) ? 1 : 0, v = f + 1, p = i[f], h = r(p), l = [], g = [], N = [], m = v; m < c; ++m) {
                        for (var T = 0; T < h; ++T) {
                            r(g) < h && g.push([]);
                            var C = i[m][T],
                                L = C.textContent || C.innerText || "";
                            g[T].push(L.trim())
                        }
                        N.push(m - v)
                    }
                    t(p, function(n, t) {
                        l[t] = 0;
                        var a = n.classList;
                        a.add("tg-sort-header"), n.addEventListener("click", function() {
                            var n = l[t];
                            ! function() {
                                for (var n = 0; n < h; ++n) {
                                    var r = p[n].classList;
                                    r.remove("tg-sort-asc"), r.remove("tg-sort-desc"), l[n] = 0
                                }
                            }(), (n = 1 == n ? -1 : +!n) && a.add(n > 0 ? "tg-sort-asc" : "tg-sort-desc"), l[t] = n;
                            var i, f = g[t],
                                m = function(r, t) {
                                    return n * f[r].localeCompare(f[t]) || n * (r - t)
                                },
                                T = function(n) {
                                    var t = d(n);
                                    if (!r(t)) {
                                        var u = o(n),
                                            a = o(n.map(e));
                                        t = d(n.map(function(n) {
                                            return n.substring(u, r(n) - a)
                                        }))
                                    }
                                    return t
                                }(f);
                            (r(T) || r(T = r(u(i = f.map(Date.parse), isNaN)) ? [] : i)) && (m = function(r, t) {
                                var e = T[r],
                                    o = T[t],
                                    u = isNaN(e),
                                    a = isNaN(o);
                                return u && a ? 0 : u ? -n : a ? n : e > o ? n : e < o ? -n : n * (r - t)
                            });
                            var C, L = N.slice();
                            L.sort(m);
                            for (var E = v; E < c; ++E)(C = s[E].parentNode).removeChild(s[E]);
                            for (E = v; E < c; ++E) C.appendChild(s[v + L[E - v]])
                        })
                    })
                }
            }
            n.addEventListener("DOMContentLoaded", function() {
                for (var t = n.getElementsByClassName("tg"), e = 0; e < r(t); ++e) try {
                    v(t[e])
                } catch (n) {}
            })
        }(document)

        // TABLE SEARCH FILTER
        function myFunction() {
        // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tg-EM4pL");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    
</body>

</html>