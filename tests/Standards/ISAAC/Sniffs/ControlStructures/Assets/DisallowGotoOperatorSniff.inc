<?php

declare(strict_types=1);

l10: print mb_chr(0x2571 + random_int(0, 1));
goto l10;
