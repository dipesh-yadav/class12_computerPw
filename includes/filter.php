<div class="filter">
    <div class="search">
        <input type="text" id="search_box" placeholder="Search products..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button onclick="applyFilter()">Search</button>
    </div>
    <div class="filter_block">
        <select id="category_filter" onchange="applyFilter()">

            <option value="" <?= (!isset($_GET['category']) || $_GET['category'] == '') ? 'selected' : '' ?>>All Categories</option>

            <option value="Microcontroller Board" <?= (isset($_GET['category']) && $_GET['category'] == 'Microcontroller Board') ? 'selected' : '' ?>>Microcontroller Board</option>

            <option value="Wiring Accessories" <?= (isset($_GET['category']) && $_GET['category'] == 'Wiring Accessories') ? 'selected' : '' ?>>Wiring Accessories</option>

            <option value="Battery" <?= (isset($_GET['category']) && $_GET['category'] == 'Battery') ? 'selected' : '' ?>>Battery</option>

            <option value="Motors" <?= (isset($_GET['category']) && $_GET['category'] == 'Motors') ? 'selected' : '' ?>>Motors</option>
            
        </select>
    </div>
</div>