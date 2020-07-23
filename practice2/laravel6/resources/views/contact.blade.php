<body class="bg-primary">
    <form
        method="POST"
        action="/contact"
        class="bg-white"
    >
        @csrf
        <div class="mb-5">
            <label for="mail">Email Adress</label>
            <input
                type="text"
                id="email"
                name="email"
            >
        </div>
        <button type="submit">Email me</button>

        <!--@42 #flashmessage-->
    @if(session('message'))
            <div>

                <h1>{{session('message')}}</h1>
            </div>
        @endif
    </form>
</body>
