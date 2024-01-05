let content = document.getElementById("content");
let searchBar = document.getElementById("search");
let oldContent = content.innerHTML;
console.log(oldContent);

searchBar.addEventListener("input", () => {
  let searchValue = searchBar.value;
  if (searchValue == "") {
    content.innerHTML = oldContent;
  } else {
    let xhr = new XMLHttpRequest();
    xhr.onload = (e) => {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          let artists = xhr.response;
          searchMusic(searchValue, (musicData) => {
            if (musicData) {
              let music = JSON.parse(musicData);
              artists = JSON.parse(artists);
              console.log(artists);
              console.log(music);
              showResults(artists, music);
            } else {
              console.log("Failed to fetch music data");
            }
          });
        } else {
          console.error(xhr.statusText);
        }
      }
    };
    xhr.onerror = (e) => {
      console.error(xhr.statusText);
    };

    let data = {
      search: searchValue,
    };

    data = JSON.stringify(data);

    xhr.open("POST", "/paroly/public/home/getArtists", true);
    xhr.send(data);
  }
});

function searchMusic(searchValue, callback) {
  let xhr = new XMLHttpRequest();
  xhr.onload = (e) => {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        let data = xhr.response;
        callback(data);
      } else {
        console.error(xhr.statusText);
        callback(null);
      }
    }
  };
  xhr.onerror = (e) => {
    console.error(xhr.statusText);
    return xhr.statusText;
  };

  let data = {
    search: searchValue,
  };

  data = JSON.stringify(data);

  xhr.open("POST", "/paroly/public/home/getMusic", true);
  xhr.send(data);
}

function showResults(artists, music) {}
