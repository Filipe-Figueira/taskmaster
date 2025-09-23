document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll("#tabs .tab-btn");
    const panels = document.querySelectorAll(".tab-panel");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            const target = btn.getAttribute("data-tab");

            // Desativar todas as abas
            buttons.forEach(b => {
                b.classList.remove("text-blue-500", "text-red-500");
                b.classList.add("text-gray-400");
            });
            panels.forEach(panel => panel.classList.add("hidden"));

            // Ativar aba clicada
            btn.classList.remove("text-gray-400");
            if (target === "excluir") {
                btn.classList.add("text-red-500");
            } else {
                btn.classList.add("text-blue-500");
            }
            document.getElementById(target).classList.remove("hidden");
        });
    });
});