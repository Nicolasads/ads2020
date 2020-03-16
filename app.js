const empresa = document.getElementById("empresa");

console.log(empresa);

const fetchEmpresa = () => {
    const promises = [];
    for(let i = 1; i <= 6; i++){    
        const url = `https://my-json-server.typicode.com/Nicolasads/api/empresa/${i}` ;
        promises.push(fetch(url).then((res) => res.json()));
    }  
    

        Promise.all(promises).then((results) => {
            const empresa = results.map((data) => ({
                name: data.name,
                id: data.id,
                image: data.image,
                type: data.type,
                imgprod: data.imgprod 
            }));
            displayEmpresa(empresa);
        });    
};

const displayEmpresa = (empresa) => {
    console.log(empresa);
    const empresaHTMLString = empresa.map (empresas => `

    <div class="container">
        <div class="card-deck">
            <div class="card">
                    <img class="card-img-top" src="${empresas.image}"/>
                <div class="card-body">
                    <h5 class="card-title">${empresas.name}</h2>
                    <p class="card-text">${empresas.type}</p>
                </div>
            </div>
        </div>
    </div>
    `)
    empresabox.innerHTML = empresaHTMLString;
};

    
fetchEmpresa();