/**
 * Takes one ore more pimcore object-IDs and returns the timestamps of the objects' latest versions
 *
 * @param (string) oid - one or more pimcore object-IDs, comma-seperated
 * @returns true, $latestVersions (array)|false, error message (string) via Zend JSON-helper
 */
public function pingAction()
{
    if ($this->getParam('oid')) {
        $oids = explode(',', $this->getParam('oid'));
        $latestVersions = array();

        foreach ($oids as $oid) {
            if ($oid != '') {
                $object = Object_Abstract::getById($oid);

                if ($object) {
                    $latestVersions[$oid] = $object->getVersions()[0]->getDate();
                }
            }
        }

        $this->_helper->json(array('success' => true, 'data' => $latestVersions));
    }
    else {
        $this->_helper->json(array('success' => false, 'data' => 'Param \'oid\' is missing.'));
    }

    $this->_helper->json(array('success' => false, 'data' => 'Something went wrong.'));;
}
