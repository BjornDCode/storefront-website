<style>

    h1, p, li {
        font-family: 'Helvetica';
    }

    p, ul {
        margin-bottom: 40px;
    }

    .logo {
        margin-bottom: 40px;
    }

    ul {
        list-style-type: none;
    }

    span {
        font-weight: bold;
    }

</style>

<div>
    <div class="logo">
        <img src="images/logo.png" />
    </div>
    <div class="title">
        <h1>
            Storefront Commercial License
        </h1>
    </div>
</div>

<div>
    <p>
        This license grants you the right to use Storefront on one commercial website.
    </p>
    <p>
        All you have to do is save this document somewhere safe.
    </p>
    <ul>
        <li>
            <span>Company:</span> {{ $data->company }}
        </li>
        <li>
            <span>Domain:</span> {{ $data->domain }}
        </li>
        <li>
            <span>License Key:</span> {{ $data->key }}
        </li>
    </ul>
    <p>
        For information on how to use Storefront check out the <a href="#">documentation</a>.
    </p>
    <p>
        Thank you for supporting Storefront!
    </p>
</div>


