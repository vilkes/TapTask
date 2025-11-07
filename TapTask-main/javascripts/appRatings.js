document.addEventListener("DOMContentLoaded", async () => {
  const idServicio = document.getElementById("idServicio")?.value;

  try {
    const res = await fetch(`../apis/apiObtenerCalificaciones.php?idServicio=${idServicio}`);
    const data = await res.json();
    console.log(data);

    if (data.success) {
      const ratings = data.ratings;
    } else {
      console.error("Error al obtener las calificaciones:", data.error);
    }
  

  const ratings = {
    5: data.ratings["5"] || 0,
    4: data.ratings["4"] || 0,
    3: data.ratings["3"] || 0,
    2: data.ratings["2"] || 0,
    1: data.ratings["1"] || 0,
  };

  const totalRatings = Object.values(ratings).reduce((a, b) => a + b, 0);
  const average =
    totalRatings > 0
      ? (
          Object.entries(ratings).reduce(
            (sum, [stars, count]) => sum + stars * count,
            0
          ) / totalRatings
        ).toFixed(1)
      : 0;

  const averageEl = document.getElementById("average");
  if (averageEl) averageEl.textContent = average;

  const starsEl = document.querySelector(".stars");
  if (starsEl) {
    const porcentaje = (average / 5) * 100;
    starsEl.style.setProperty("--rating-percent", `${porcentaje}%`);
  }

  const barsContainer = document.getElementById("rating-bars");
  if (barsContainer) {
    barsContainer.innerHTML = "";

    for (let i = 5; i >= 1; i--) {
      const count = ratings[i] || 0;
      const percent = totalRatings ? (count / totalRatings) * 100 : 0;

      const bar = document.createElement("div");
      bar.classList.add("rating-bar");
      bar.innerHTML = `
        <span class="star-span">${i} ★</span>
        <div class="bar">
          <div class="fill" style="width:${percent}%;"></div>
        </div>
      `;
      barsContainer.appendChild(bar);
    }
  }

  const underDiv = document.querySelector(".under");
  if (underDiv) {
    const totalEl = document.createElement("h2");
    totalEl.textContent = `Basado en ${totalRatings} opiniones`;
    totalEl.classList.add("total-opiniones");
    underDiv.prepend(totalEl);
  }
  } catch (error) {
    console.error("Error al obtener las calificaciones:", error);
  }
});