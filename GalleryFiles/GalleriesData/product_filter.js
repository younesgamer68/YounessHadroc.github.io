const categories = {

    //this the Eye Glasses
    'Eye_All': {
        filter: product => product.type === "eyeglasses",
        name: 'All Eyeglasses'
    },
    'Eye_Men': {
        filter: product => product.type === "eyeglasses" && product.isMen,
        name: 'Men\'s Eyeglasses'
    },
    'Eye_Women': {
        filter: product => product.type === "eyeglasses" && product.isWomen,
        name: 'Women\'s Eyeglasses'
    },
    'Eye_Kids': {
        filter: product => product.type === "eyeglasses" && product.isKids,
        name: 'Kids\' Eyeglasses'
    },

    'Eye_Materials': {
        filter: product => product.type === "eyeglasses",
        name: 'All Eyeglasses'
    },
    'Eye_Frames': {
        filter: product => product.type === "eyeglasses",
        name: 'All Eyeglasses'
    },



    //this the Sun Glasses
    'Sun_All': {
        filter: product => product.type === "sunglasses",
        name: 'All Sunglasses'
    },
    'Sun_Men': {
        filter: product => product.type === "sunglasses" && product.isMen,
        name: 'Men\'s Sunglasses'
    },
    'Sun_Women': {
        filter: product => product.type === "sunglasses" && product.isWomen,
        name: 'Women\'s Sunglasses'
    },
    'Sun_Kids': {
        filter: product => product.type === "sunglasses" && product.isKids,
        name: 'Kids\' Sunglasses'
    },
    'Sun_Materials': {
        filter: product => product.type === "sunglasses",
        name: 'All Eyeglasses'
    },
    'Sun_Frames': {
        filter: product => product.type === "sunglasses",
        name: 'All Eyeglasses'
    },



    // SunGlasses & EyeGlasses Categories
    'Bestsellers': {
        filter: product => product.isBestseller,
        name: 'Bestsellers'
    },
    'Under20': {
        filter: product => {
            const priceStr = product.price.replace(/[^0-9.]/g, '');
            const price = parseFloat(priceStr);
            return price <= 20;
        },
        name: 'Under $20'
    },
    'Discount': {
        filter: product => product.isDiscount,
        name: 'On Discount'
    },
    'Summer_Sale': {
        filter: product => product.isTopRated,
        name: 'Summer Sale'
    },
    'Newer': {
        filter: product => product.isNew,
        name: 'New Arrivals'
    },




    //this the Sports Glasses
    'Sports_all': {
        filter: product => product.isSports,
        name: 'All SportsGlasses'
    },
    'Sports_running': {
        filter: product => product.isSports && product.type === "Sports_running",
        name: 'running SportsGlasses'
    },
    'Sports_cycling': {
        filter: product => product.isSports && product.type === "Sports_cycling",
        name: 'running SportsGlasses'
    },
    'Sports_swimming': {
        filter: product => product.isSports && product.type === "Sports_swimming",
        name: 'running SportsGlasses'
    },
    'Sports_winter': {
        filter: product => product.isSports && product.type === "Sports_winter",
        name: 'running SportsGlasses'
    },

    'Sports_Shapes': {
        filter: product => product.isSports,
        name: 'running SportsGlasses'
    },
    'Sports_Frames': {
        filter: product => product.isSports,
        name: 'running SportsGlasses'
    },
    'Sports_Top': {
        filter: product => product.isSports && product.isTopRated,
        name: 'running SportsGlasses'
    },
    'Sports_Discount': {
        filter: product => product.isSports && product.isDiscount,
        name: 'Discount SportsGlasses'
    },



    
    //this the Accessories
    'Acces_all': {
        filter: product => product.isAcces,
        name: 'All Accessories'
    },

    'Acces_felt': {
        filter: product => product.isAcces && product.type === "Acces_felt",
        name: 'Acces_felt'
    },
    'Acces_cords': {
        filter: product => product.isAcces && product.type === "Acces_cords",
        name: 'Acces_cords'
    },
    'Acces_case/cleankits': {
        filter: product => product.isAcces && product.type === "Acces_case/cleankits",
        name: 'Acces_case/cleankits'
    },
    'Acces_clips': {
        filter: product => product.isAcces && product.type === "Acces_clips",
        name: 'Acces_clips'
    },

};
