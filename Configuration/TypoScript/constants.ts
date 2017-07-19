
plugin.tx_extbaselangtest {
    view {
        # cat=plugin.tx_extbaselangtest/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:extbaselangtest/Resources/Private/Templates/
        # cat=plugin.tx_extbaselangtest/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:extbaselangtest/Resources/Private/Partials/
        # cat=plugin.tx_extbaselangtest/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:extbaselangtestp/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_extbaselangtest//a; type=string; label=Default storage PID
        storagePid = 1
    }
}
